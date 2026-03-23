<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Vessel;

class SearchController extends Controller
{
    //

    //function for searching booking.
    public function search(Request $request)
    {
        // dd($request->all());
        $schedules = Schedule::with(['VesselInfo', 'DestinationInfo', 'Schedules', 'Cabins.details'])

            // Destination (country OR name)
            ->whereHas('DestinationInfo', function ($q) use ($request) {
                $q->where('destination_country', 'like', "%{$request->destination}%")
                    ->orWhere('destination_name', 'like', "%{$request->destination}%");

                // $q->whereDate('schedule_from', '>=', $request->date);
            })


            ->whereDate('schedule_from', '>=', $request->date ?? date('Y-m-d'))

            ->orderBy('created_at', 'asc')
            ->get();

        // return $schedules;

        return response()->json([
            'success' => true,
            'message' => 'Schedules Fetched successfully',
            'data' => $schedules
        ]);
    }
}
