<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\BookingUserInfo;

class BookingController extends Controller
{
    /**
     * Create booking (atomic)
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            $booking = Booking::create($request->validate([
                'ref_code' => 'required|string|max:100',
                'user_id' => 'nullable|string|max:100',
                'booking_details_id' => 'required|integer',
                'trip_year' => 'required|string|max:100',
                'status' => 'required|string|max:100',
                'booking_date' => 'required|date',
                'schedule_id' => 'required|integer',
                'partner_id' => 'required|integer',
            ]));

            foreach ($request->booking_details as $detail) {
                BookingDetail::create([
                    'booking_id' => $booking->id,
                    'cabin_id' => $detail['cabin_id'],
                    'guest_number' => $detail['guest_number'],
                    'schedule_id' => $detail['schedule_id'],
                ]);
            }

            BookingUserInfo::create(
                array_merge(
                    $request->booking_userinfo,
                    ['booking_id' => $booking->id]
                )
            );

            return response()->json([
                'message' => 'Booking created successfully',
                'data' => $booking->load([
                    'bookingDetails.cabin.details',
                    'bookingUserInfo'
                ])
            ], 201);
        });
    }

    /**
     * Fetch all bookings
     */
    public function index()
    {
        return response()->json(
            Booking::with([
                'bookingDetails.cabin.details',
                'bookingUserInfo'
            ])->orderBy('created_at', 'asc')->get()
        );
    }

    /**
     * Fetch single booking
     */
    public function show($id)
    {
        $booking = Booking::with([
            'bookingDetails.cabin.details',
            'bookingUserInfo'
        ])->find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json($booking);
    }

    /**
     * Update booking (main table only)
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->update($request->only([
            'status',
            'trip_year',
            'schedule_id',
            'partner_id'
        ]));

        return response()->json([
            'message' => 'Booking updated successfully',
            'data' => $booking
        ]);
    }

    /**
     * Delete booking
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
