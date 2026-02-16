<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    //
    /**
     * Create destination
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'destination_name' => 'required|string|max:255',
            'destination_country' => 'required|string|max:255',
            'destination_popularity_points' => 'nullable|integer',
            'vessel_id_list' => 'nullable|array',
            'partner_id' => 'nullable|integer',
            'destination_photos' => 'nullable|array',
            'destination_thumbnail' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $destination = Destination::create($data);

        return response()->json([
            'message' => 'Destination created successfully',
            'data' => $destination
        ], 201);
    }

    /**
     * Fetch all destinations
     */
    public function index()
    {
        return response()->json(
            Destination::orderBy('created_at', 'asc')->get()
        );
    }

    /**
     * Fetch single destination by ID
     */
    public function show($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'message' => 'Destination not found'
            ], 404);
        }

        return response()->json($destination);
    }

    /**
     * Update destination
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'message' => 'Destination not found'
            ], 404);
        }

        $data = $request->validate([
            'destination_name' => 'sometimes|string|max:255',
            'destination_country' => 'sometimes|string|max:255',
            'destination_popularity_points' => 'sometimes|integer',
            'vessel_id_list' => 'sometimes|array',
            'partner_id' => 'sometimes|integer',
            'destination_photos' => 'sometimes|array',
            'destination_thumbnail' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ]);

        $destination->update($data);

        return response()->json([
            'message' => 'Destination updated successfully',
            'data' => $destination
        ]);
    }

    /**
     * Delete destination
     */
    public function destroy($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'message' => 'Destination not found'
            ], 404);
        }

        $destination->delete();

        return response()->json([
            'message' => 'Destination deleted successfully'
        ]);
    }
}
