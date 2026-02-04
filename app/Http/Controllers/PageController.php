<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailerSetting;
use App\Models\User;
use App\Models\SettingRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function page_dashboard()
    {
        return view('pages.dashboard');
    }

    public function page_UserManagement()
    {

        $roles = SettingRole::all();
        $users = User::with('role')->get();

        return view('pages.usermanagement', compact('roles', 'users'));
    }
    public function page_Mailer()
    {

        $config = MailerSetting::latest()->first();
        return view('pages.settings.mailer', compact('config'));
    }
    public function page_Menus()
    {
        return view('pages.settings.menus');
    }

    public function page_Themes()
    {
        return view('pages.settings.theme');
    }
    public function page_Users()
    {
        return view('pages.settings.users');
    }
    public function page_Forms()
    {
        return view('pages.settings.forms');
    }

    public function page_settings()
    {
        return view('pages.settings.settings');
    }

    public function page_vessel()
    {
        return view('pages.vessel');
    }
    public function page_schedules()
    {
        return view('pages.schedules');
    }
    public function page_bookings()
    {
        return view('pages.bookings');
    }
    public function page_destinations()
    {
        return view('pages.destinations');
    }
    public function page_operators()
    {
        return view('pages.operators');
    }


    public function profile()
    {
        return "page profile";
    }

    public function settings()
    {
        return "page settings";
    }
}
