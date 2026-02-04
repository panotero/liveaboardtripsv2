<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NavMenu;
use Illuminate\Support\Facades\DB;

class NavMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu_array = [
            ['id' => 1, 'title' => 'Dashboard', 'icon' => 'fas fa-home', 'link' => '/page_dashboard', 'allowed_roles' => json_encode(['1']), 'parent_menu' => 0],
            ['id' => 2, 'title' => 'User Management', 'icon' => 'fas fa-users', 'link' => '/page_users', 'allowed_roles' => json_encode(['1']), 'parent_menu' => 0],
            ['id' => 3, 'title' => 'Developer Option', 'icon' => 'fas fa-users', 'link' => '#', 'allowed_roles' => json_encode(['1']), 'parent_menu' => 0],
            ['id' => 4, 'title' => 'Mailer', 'icon' => '', 'link' => '/page_mailer', 'allowed_roles' => json_encode(['1']), 'parent_menu' => 3],
            ['id' => 5, 'title' => 'Menus', 'icon' => '', 'link' => '/page_menus', 'allowed_roles' => json_encode(['1']), 'parent_menu' => 3],
            ['id' => 6, 'title' => 'Vessel', 'icon' => '', 'link' => 'page_vessel', 'allowed_roles' => json_encode(['1', '2', '3', '4']), 'parent_menu' => 0],
            ['id' => 7, 'title' => 'Schedules', 'icon' => '', 'link' => 'page_schedules', 'allowed_roles' => json_encode(['1', '2', '3', '4']), 'parent_menu' => 0],
            ['id' => 8, 'title' => 'Destinations', 'icon' => '', 'link' => 'page_destinations', 'allowed_roles' => json_encode(['1', '2', '3', '4']), 'parent_menu' => 0],
            ['id' => 9, 'title' => 'Bookings', 'icon' => '', 'link' => 'page_bookings', 'allowed_roles' => json_encode(['1', '2', '3', '4']), 'parent_menu' => 0],
        ];

        DB::table('nav_menus')->upsert(
            $menu_array,
            ['title'],   // unique key to check for existing record
            ['icon', 'link', 'allowed_roles', 'parent_menu'] // columns to update if exists
        );
    }
}
