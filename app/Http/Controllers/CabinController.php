<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\CabindDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CabinController extends Controller
{
    // Fetch all cabins with their details
    public function index()
    {
        $cabins = Cabin::with('details')->get();
        return response()->json($cabins);
    }

    // Fetch a single cabin by ID with details
    public function show($id)
    {
        $cabin = Cabin::with('details')->find($id);

        if (!$cabin) {
            return response()->json(['success' => false, 'message' => 'Cabin not found'], 404);
        }

        return response()->json($cabin);
    }

    // Store a new cabin with cabin details
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vessel_id' => 'required|integer',
            'partner_id' => 'required|integer',
            'trip_year' => 'required|string|max:10',
            'cabin_price' => 'required|numeric',
            'surcharge_percentage' => 'required|numeric',
            // cabin details
            'cabin_name' => 'required|string|max:100',
            'cabin_description' => 'nullable|string',
            'cabin_thumbnail' => 'nullable|string',
            'cabin_photos' => 'nullable|array',
            'guest_capacity' => 'required|integer',
            'bed_number' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // Create cabin details first
        $details = CabindDetails::create([
            'vessel_id' => $request->vessel_id,
            'partner_id' => $request->partner_id,
            'cabin_name' => $request->cabin_name,
            'cabin_description' => $request->cabin_description,
            'cabin_thumbnail' => $request->cabin_thumbnail,
            'cabin_photos' => $request->cabin_photos,
            'guest_capacity' => $request->guest_capacity,
            'bed_number' => $request->bed_number,
        ]);

        // Create the cabin
        $cabin = Cabin::create([
            'cabin_details_id' => $details->id,
            'vessel_id' => $request->vessel_id,
            'schedule_id' => $request->schedule_id ?? null,
            'partner_id' => $request->partner_id,
            'trip_year' => $request->trip_year,
            'cabin_price' => $request->cabin_price,
            'surcharge_percentage' => $request->surcharge_percentage,
        ]);

        return response()->json(['success' => true, 'data' => $cabin->load('details')]);
    }

    // Update a cabin and its details
    public function update(Request $request, $id)
    {
        $cabin = Cabin::with('details')->find($id);

        if (!$cabin) {
            return response()->json(['success' => false, 'message' => 'Cabin not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'vessel_id' => 'sometimes|integer',
            'trip_year' => 'sometimes|string|max:10',
            'cabin_price' => 'sometimes|numeric',
            'surcharge_percentage' => 'sometimes|numeric',
            // cabin details
            'cabin_name' => 'sometimes|string|max:100',
            'cabin_description' => 'sometimes|string',
            'cabin_thumbnail' => 'sometimes|string',
            'cabin_photos' => 'sometimes|array',
            'guest_capacity' => 'sometimes|integer',
            'bed_number' => 'sometimes|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // Update cabin details
        $cabin->details()->update($request->only([
            'cabin_name',
            'cabin_description',
            'cabin_thumbnail',
            'cabin_photos',
            'guest_capacity',
            'bed_number',
        ]));

        // Update cabin
        $cabin->update($request->only([
            'vessel_id',
            'schedule_id',
            'trip_year',
            'cabin_price',
            'surcharge_percentage',
        ]));

        return response()->json(['success' => true, 'data' => $cabin->load('details')]);
    }

    // Delete a cabin and its details
    public function destroy($id)
    {
        $cabin = Cabin::with('details')->find($id);

        if (!$cabin) {
            return response()->json(['success' => false, 'message' => 'Cabin not found'], 404);
        }

        // Delete the details first
        $cabin->details()->delete();

        // Delete the cabin
        $cabin->delete();

        return response()->json(['success' => true, 'message' => 'Cabin deleted successfully']);
    }
}
