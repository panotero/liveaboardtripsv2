<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\CabindDetails;
use App\Models\Vessel;
use App\Models\VesselSpecification;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class VesselController extends Controller
{
    protected $uploadService;

    public function __construct(FileUploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    // Existing function: fetch by user role
    public function index($userId)
    {
        $user = User::with('role')->where('id', $userId)->first();

        if ($user->role->id === 1) {
            $vesselList = Vessel::with(['specification', 'cabins.details'])->get();
            return response()->json([
                'success' => true,
                'vesselList' => $vesselList
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 403);
    }

    // ------------------------------
    // New: fetch all vessels (no user filter)
    // ------------------------------
    public function getAll()
    {
        $vessels = Vessel::with(['specification', 'cabins.details'])->get();
        return response()->json([
            'success' => true,
            'vessels' => $vessels
        ]);
    }

    //list only without cabin information. used for dropdown menus
    public function list()
    {
        $vessels = Vessel::get();

        return response()->json([
            'success' => true,
            'vessels' => $vessels
        ]);
    }
    public function show($vesselId)
    {
        $vessel = Vessel::with(['specification', 'cabins.details'])->find($vesselId);

        if (!$vessel) {
            return response()->json([
                'success' => false,
                'message' => 'Vessel not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'vessel' => $vessel
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $vessel = json_decode($request->vessel_payload, true) ?? [];
        $cabins = json_decode($request->cabin_payload, true) ?? [];

        /* Merge decoded data so Laravel validator can read them */
        $request->merge([
            'vessel' => $vessel,
            'cabins' => $cabins,
        ]);
        $validator = Validator::make($request->all(), [

            /** =========================
             *  VESSEL DATA (JSON)
             *  ========================= */
            'vessel.vessel_name' => 'required|string|max:255',
            'vessel.description' => 'nullable|string',
            'vessel.partner_id'  => 'required|string',

            /** Specifications */
            'vessel.year_model'         => 'nullable|integer|min:1990',
            'vessel.year_renovation'    => 'nullable|integer|min:1990',
            'vessel.beam'               => 'nullable|string|max:255',
            'vessel.fuel_capacity'      => 'nullable|string|max:255',
            'vessel.cabin_capacity'     => 'nullable|integer|min:0',
            'vessel.bathroom_number'    => 'nullable|integer|min:0',
            'vessel.top_speed'          => 'nullable|numeric|min:0',
            'vessel.cruising_speed'     => 'nullable|numeric|min:0',
            'vessel.engines'            => 'nullable|string|max:255',
            'vessel.max_guest_capacity' => 'nullable|integer|min:1',
            'vessel.freshwater_maker'   => 'nullable|string|max:255',
            'vessel.tenders'            => 'nullable|string|max:255',
            'vessel.water_capacity'     => 'nullable|string|max:255',

            /** =========================
             *  CABINS DATA (ARRAY JSON)
             *  ========================= */
            'cabins'                  => 'nullable|array',
            'cabins.*.name'           => 'required|string|max:255',
            'cabins.*.description'    => 'nullable|string',
            'cabins.*.beds'           => 'required|integer|min:1',
            'cabins.*.guest_capacity' => 'required|integer|min:1',
            'cabins.*.quantity'       => 'required|integer|min:1',
            // NOTE: images are now inside each cabin, so no direct validation here

            /** =========================
             *  FILES
             *  ========================= */
            'thumbnail'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'photos'         => 'nullable|array',
            'photos.*'       => 'image|mimes:jpg,jpeg,png,webp|max:5120',

        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // return json_encode($cabinPhotoPaths);
        // if ($request->hasFile('cabin_images')) {
        //     $cabinImages = $request->file('cabin_images');

        //     foreach ($cabinImages as $index => $file) {
        //         echo "Cabin #{$index} image info:\n";
        //         echo "Original Name: " . $file->getClientOriginalName() . "\n";
        //         echo "Size: " . $file->getSize() . " bytes\n";
        //         echo "Mime Type: " . $file->getMimeType() . "\n\n";
        //     }

        //     // Or if you want a quick dump of the objects
        //     dd($cabinImages);
        // } else {
        //     dd('No cabin images uploaded.');
        // }

        DB::beginTransaction();

        // try {
        $partnerID = $request->vessel['partner_id'];
        // 🔹 Upload files
        $thumbnailPath = $this->uploadService
            ->uploadSingle($request->file('thumbnail'), "uploads/vessels/{$partnerID}/thumbnails");

        $photoPaths = $this->uploadService
            ->uploadMultiple($request->file('photos'), "uploads/vessels/{$partnerID}/vesel/photos");

        // $cabinPhotoPaths = $this->uploadService
        //     ->uploadMultiple($request->file('cabin_images'), "uploads/vessels/{$partnerID}/cabin/photos");

        // 🔹 Save main vessel
        $vesselInfo = Vessel::create([
            'partner_id'        => $partnerID ?? null,
            'vessel_name'       => $vessel['vessel_name'],
            'vessel_thumbnail'  => $thumbnailPath,
            'vessel_photos'     => json_encode($photoPaths),
            'description'       => $vessel['description'],
        ]);

        // 🔹 Save specification (linked)
        VesselSpecification::create([
            'vessel_id'                => $vesselInfo->id,
            'vessel_year_model'           => $request->vessel['year_model'] ?? null,
            'vessel_year_renovation'      => $request->vessel['year_renovation'] ?? null,
            'vessel_beam'                 => $request->vessel['beam'] ?? null,
            'vessel_fuel_capacity'        => $request->vessel['fuel_capacity'] ?? null,
            'vessel_cabin_capacity'       => $request->vessel['cabin_capacity'] ?? null,
            'vessel_bathroom_number'      => $request->vessel['bathroom_number'] ?? null,
            'vessel_topspeed'             => $request->vessel['top_speed'] ?? null,
            'vessel_cruisingspeed'        => $request->vessel['cruising_speed'] ?? null,
            'vessel_engines'              => $request->vessel['engines'] ?? null,
            'vessel_max_guest_capacity'   => $request->vessel['max_guest_capacity'] ?? null,
            'vessel_freshwater_maker'     => $request->vessel['freshwater_maker'] ?? null,
            'vessel_tenders'              => $request->vessel['tenders'] ?? null,
            'vessel_water_capacity'       => $request->vessel['water_capacity'] ?? null,
        ]);
        //foreach the cabins
        foreach ($request->cabins as $index => $cabin) {

            $cabinPhotoPaths = $this->uploadService
                ->uploadMultiple($request->file('cabin_images')[$index], "uploads/vessels/cabin/photos");
            //save cabin details
            $cabinInfo = CabindDetails::create([
                'vessel_id'  => $vesselInfo->id,
                'partner_id' => $partnerID ?? null,
                'cabin_name' => $cabin['name'],
                'cabin_description' => $cabin['description'],
                'cabin_thumbnail' => null,
                'cabin_photos' => json_encode($cabinPhotoPaths),
                'guest_capacity' => $cabin['guest_capacity'],
                'cabin_number' => $cabin['quantity'],
                'bed_number' => $cabin['beds'],
                'created_at' => now(),
                'updated_at' => now(),

            ]);
            //save the cabin tabile
            Cabin::create([
                'cabin_details_id' => $cabinInfo->id,
                'vessel_id'  => $vesselInfo->id,
                'schedule_id' => null,
                'partner_id' => $partnerID ?? null,
                'trip_year' => null,
                'cabin_price' => $cabin['price'],
                'surcharge_percentage' => $cabin['surcharge'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // return;

        DB::commit();
        // return $cabins;

        return response()->json([
            'success' => true,
            'message' => 'Vessel created successfully'
        ]);
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }

    // ------------------------------
    // Update vessel, specification, and optionally cabins
    // ------------------------------
    public function update(Request $request, $vesselId)
    {
        $vessel = Vessel::with(['specification', 'cabins'])->find($vesselId);
        if (!$vessel) {
            return response()->json(['success' => false, 'message' => 'Vessel not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'vessel_name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|nullable',
            'thumbnail' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:5120',
            'photos' => 'sometimes|array',
            'photos.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
            'specification' => 'sometimes|array',
            'specification.year_model' => 'sometimes|integer|min:1990',
            'specification.year_renovation' => 'sometimes|integer|min:1990',
            'cabins' => 'sometimes|array',
            'cabins.*.id' => 'sometimes|integer|exists:cabin_table,id',
            'cabins.*.name' => 'sometimes|string|max:255',
            'cabins.*.description' => 'sometimes|string|nullable',
            'cabins.*.beds' => 'sometimes|integer|min:1',
            'cabins.*.guest_capacity' => 'sometimes|integer|min:1',
            'cabins.*.price' => 'sometimes|numeric|min:0',
            'cabins.*.surcharge' => 'sometimes|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {
            // ---------------------------
            // Update vessel main info
            // ---------------------------
            if ($request->has('vessel_name')) {
                $vessel->vessel_name = $request->vessel_name;
            }
            if ($request->has('description')) {
                $vessel->description = $request->description;
            }

            // Handle thumbnail
            if ($request->hasFile('thumbnail')) {
                $vessel->vessel_thumbnail = $this->uploadService
                    ->uploadSingle($request->file('thumbnail'), "uploads/vessels/{$vessel->partner_id}/thumbnails");
            }

            // Handle photos
            if ($request->hasFile('photos')) {
                $photoPaths = $this->uploadService
                    ->uploadMultiple($request->file('photos'), "uploads/vessels/{$vessel->partner_id}/vessel/photos");
                $vessel->vessel_photos = json_encode($photoPaths);
            }

            $vessel->save();

            // ---------------------------
            // Update specification
            // ---------------------------
            if ($request->has('specification')) {
                $spec = $vessel->specification;
                if (!$spec) {
                    $spec = VesselSpecification::create(['vessel_id' => $vessel->id]);
                }

                $specData = $request->specification;
                $spec->update($specData);
            }

            // ---------------------------
            // Update cabins
            // ---------------------------
            if ($request->has('cabins')) {
                foreach ($request->cabins as $cabinInput) {
                    if (isset($cabinInput['id'])) {
                        // Update existing cabin
                        $cabin = Cabin::with('details')->find($cabinInput['id']);
                        if ($cabin) {
                            $cabin->update([
                                'cabin_price' => $cabinInput['price'] ?? $cabin->cabin_price,
                                'surcharge_percentage' => $cabinInput['surcharge'] ?? $cabin->surcharge_percentage,
                            ]);

                            $cabin->details()->update([
                                'cabin_name' => $cabinInput['name'] ?? $cabin->details->cabin_name,
                                'cabin_description' => $cabinInput['description'] ?? $cabin->details->cabin_description,
                                'guest_capacity' => $cabinInput['guest_capacity'] ?? $cabin->details->guest_capacity,
                                'bed_number' => $cabinInput['beds'] ?? $cabin->details->bed_number,
                            ]);
                        }
                    } else {
                        // Optional: create new cabins here if needed
                    }
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Vessel updated successfully',
                'vessel' => $vessel->load(['specification', 'cabins.details'])
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function delete(Request $request)
    {
        try {
            $query = Vessel::findOrFail($request->vesselId);
            $query->delete();
            return response()->json([
                'success' => true,
                'message' => 'Vessel created successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
