<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vessel;
use App\Models\Cabin;
use App\Models\CabindDetails;
use App\Models\Destination;
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\BookingUserInfo;

class SampleSeed extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            // ----------------------
            // 1️⃣ Vessel
            // ----------------------
            $vessel = Vessel::create([
                'partner_id' => 1,
                'vessel_name' => 'MV Ocean Explorer',
                'vessel_thumbnail' => 'vessels/ocean_explorer_thumb.jpg',
                'vessel_photos' => ['vessels/ocean_1.jpg', 'vessels/ocean_2.jpg'],
                'description' => 'A modern liveaboard vessel designed for comfort and safety.'
            ]);

            // ----------------------
            // 2️⃣ Cabins + Cabin Details (multiple)
            // ----------------------
            $cabins = [];
            $cabinData = [
                ['Deluxe Cabin', 2500, 2],
                ['Premium Cabin', 3000, 3],
                ['Standard Cabin', 2000, 2]
            ];

            foreach ($cabinData as $index => [$name, $price, $capacity]) {
                $details = CabindDetails::create([
                    'vessel_id' => $vessel->id,
                    'partner_id' => 1,
                    'cabin_name' => $name,
                    'cabin_description' => "$name with sea view",
                    'cabin_thumbnail' => "cabins/{$name}_thumb.jpg",
                    'cabin_photos' => json_encode([
                        "cabins/{$name}_1.jpg",
                        "cabins/{$name}_2.jpg"
                    ]),
                    'guest_capacity' => $capacity,
                    'bed_number' => $capacity, // for simplicity
                ]);

                $cabin = Cabin::create([
                    'cabin_details_id' => $details->id,
                    'vessel_id' => $vessel->id,
                    'schedule_id' => 1,
                    'partner_id' => 1,
                    'trip_year' => '2026',
                    'cabin_price' => $price,
                    'surcharge_percentage' => 10,
                ]);

                $cabins[] = $cabin;
            }

            // ----------------------
            // 3️⃣ Destination
            // ----------------------
            $destination = Destination::create([
                'destination_name' => 'Tubbataha Reef',
                'destination_country' => 'Philippines',
                'destination_popularity_points' => 100,
                'vessel_id_list' => [$vessel->id],
                'partner_id' => 1,
                'destination_photos' => ['destinations/tub_1.jpg', 'destinations/tub_2.jpg'],
                'destination_thumbnail' => 'destinations/tub_thumb.jpg',
                'description' => 'A world-class diving destination.'
            ]);

            // ----------------------
            // 4️⃣ Schedule
            // ----------------------
            $schedule = Schedule::create([
                'schedule_title' => 'Tubbataha Liveaboard Trip',
                'schedule_from' => '2026-03-01',
                'schedule_to' => '2026-03-07',
                'vessel_id' => $vessel->id,
                'itinerary' => 'Tubbataha North & South',
                'destination_id' => $destination->id,
                'partner_id' => 1,
                'status' => 1,
            ]);

            // ----------------------
            // 5️⃣ Booking + Multiple Booking Details + UserInfo
            // ----------------------
            $booking = Booking::create([
                'ref_code' => 'BOOK-2026-001',
                'user_id' => 'USER-001',
                'booking_details_id' => 1,
                'trip_year' => '2026',
                'status' => '1',
                'booking_date' => now(),
                'schedule_id' => $schedule->id,
                'partner_id' => 1,
            ]);

            // Book multiple cabins for the same booking
            foreach ($cabins as $i => $cabin) {
                BookingDetail::create([
                    'booking_id' => $booking->id,
                    'cabin_id' => $cabin->id,
                    'guest_number' => $cabinData[$i][2], // capacity as guest number
                    'schedule_id' => $schedule->id,
                ]);
            }

            BookingUserInfo::create([
                'booking_id' => $booking->id,
                'first_name' => 'Juan',
                'last_name' => 'Dela Cruz',
                'address_1' => '123 Main Street',
                'address_2' => null,
                'country' => 'Philippines',
                'city' => 'Manila',
                'mobile' => '09171234567',
                'email' => 'juan@example.com',
                'phone' => '028123456',
                'guest_list' => json_encode([
                    ['name' => 'Juan Dela Cruz'],
                    ['name' => 'Maria Dela Cruz'],
                    ['name' => 'Pedro Santos']
                ]),
            ]);
        }); // end transaction
    }
}
