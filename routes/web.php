<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MailerController;
use App\Http\Middleware\CheckUserStatus;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});
Route::get('/', function () {
    return view('home');
});


Route::middleware(['auth', 'check.status', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/debug_auth', function () {
        $user = auth()->user();
        if ($user) {
            $user->load('office');
        }

        return [
            'isLoggedIn' => auth()->check(),
            'user' => $user,
        ];
    });

    Route::get('/page_dashboard', [PageController::class, 'page_dashboard']);
    Route::get('/page_usermanagement', [PageController::class, 'page_UserManagement']);
    Route::get('/page_menus', [PageController::class, 'page_Menus']);
    Route::get('/page_themes', [PageController::class, 'page_Themes']);
    Route::get('/page_users', [PageController::class, 'page_Users']);
    Route::get('/page_forms', [PageController::class, 'page_Forms']);
    Route::get('/page_vessel', [PageController::class, 'page_vessel']);
    Route::get('/page_bookings', [PageController::class, 'page_bookings']);
    Route::get('/page_destinations', [PageController::class, 'page_destinations']);
    Route::get('/page_schedules', [PageController::class, 'page_schedules']);
    Route::get('/page_operators', [PageController::class, 'page_operators']);
    Route::get('/page_featuredHome', [PageController::class, 'page_featuredHome']);
    Route::get('/page_settings', [PageController::class, 'page_settings']);
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::get('/settings', [PageController::class, 'settings'])->name('settings');

    Route::get('/testmail', [MailerController::class, 'test']);


    Route::get('/page_mailer', [PageController::class, 'page_Mailer']);
    Route::post('/mailer_save', [MailerController::class, 'save'])->name('mailer_save');
    Route::post('/mailer/send', [MailerController::class, 'send'])->name('mailer.send');


    Route::resource('users', UserController::class)->middleware('can:isSuperAdmin');

    Route::prefix('notifications')->group(function () {
        Route::get('/', [NotificationController::class, 'getNotifications']);
    });
});

Route::get('/search', [SearchController::class, 'search']);
Route::get('/destinations', [PageController::class, 'destinations']);
Route::get('/trips', [PageController::class, 'trips']);
Route::get('/contactUs', [PageController::class, 'contactUs']);
require __DIR__ . '/auth.php';
