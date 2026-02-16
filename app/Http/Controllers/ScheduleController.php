<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Create schedule
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'schedule_title' => 'required|string|max:100',
            'schedule_from' => 'required|date',
            'schedule_to' => 'required|date',
            'vessel_id' => 'required|integer',
            'itinerary' => 'nullable|string|max:100',
            'destination_id' => 'required|integer',
            'partner_id' => 'required|integer',
            'status' => 'nullable|integer',
        ]);

        $schedule = Schedule::create($data);

        return response()->json([
            'message' => 'Schedule created successfully',
            'data' => $schedule
        ], 201);
    }

    /**
     * Fetch all schedules
     */
    public function index()
    {
        return response()->json(
            Schedule::orderBy('created_at', 'asc')->get()
        );
    }

    /**
     * Fetch single schedule by ID
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                'message' => 'Schedule not found'
            ], 404);
        }

        return response()->json($schedule);
    }

    /**
     * Update schedule
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                'message' => 'Schedule not found'
            ], 404);
        }

        $data = $request->validate([
            'schedule_title' => 'sometimes|string|max:100',
            'schedule_from' => 'sometimes|date',
            'schedule_to' => 'sometimes|date',
            'vessel_id' => 'sometimes|integer',
            'itinerary' => 'sometimes|nullable|string|max:100',
            'destination_id' => 'sometimes|integer',
            'partner_id' => 'sometimes|integer',
            'status' => 'sometimes|integer',
        ]);

        $schedule->update($data);

        return response()->json([
            'message' => 'Schedule updated successfully',
            'data' => $schedule
        ]);
    }

    /**
     * Delete schedule
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                'message' => 'Schedule not found'
            ], 404);
        }

        $schedule->delete();

        return response()->json([
            'message' => 'Schedule deleted successfully'
        ]);
    }
}
