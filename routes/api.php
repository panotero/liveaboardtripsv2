<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\UserConfigController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\ApprovalsController;
use App\Http\Controllers\CabinController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FinanceBudgetController;
use App\Http\Controllers\FinanceActivityController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Organized by feature/module. Middleware groups are used where needed.
| Each resource is grouped using Route::prefix for clarity.
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
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
    Route::get('/user', fn(Request $request) => $request->user());
    Route::get('/user_info', function () {

        $user = auth()->user();
        return [
            'isLoggedIn' => auth()->check(),
            'user' => $user,
        ];
    });


    Route::get('/load_menu', [MenusController::class, 'index']);



    Route::prefix('notifications')->group(function () {
        Route::get('/', [NotificationController::class, 'getNotifications']);
    });


    Route::post('/notifications/mark-read', [NotificationController::class, 'markRead']);
    Route::get('/notifications/stream', [NotificationController::class, 'stream']);

    //users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::get('/reports/{office_code}', [UserController::class, 'getUsersWithDocs']);
        Route::post('/', [UserController::class, 'store']);
        Route::patch('/save/{id}', [UserController::class, 'save_info']);
        Route::patch('/deactivate/{id}', [UserController::class, 'deactivate']);
        Route::patch('/reactivate/{id}', [UserController::class, 'reactivate']);
        Route::get('/reports/{officename}', [UserController::class, 'reports']);
    });


    Route::post('/send-mail', [MailerController::class, 'send']);


    Route::prefix('nav_menus')->group(function () {
        Route::get('/list', [MenusController::class, 'menulist']);
        Route::post('/', [MenusController::class, 'store']);
        Route::put('/{id}', [MenusController::class, 'update']);
        Route::delete('/{id}', [MenusController::class, 'destroy']);
        Route::post('/swap', [MenusController::class, 'swapMenuOrder']);
    });
    Route::get('/roles', fn() => DB::table('setting_role')->get());

    Route::post('/test-api', function (Request $request) {
        Log::info('Test API triggered', $request->all());
        return response()->json([
            'success' => true,
            'message' => 'API successfully triggered!',
        ]);
    });

    Route::prefix('vessels')->group(function () {
        Route::get('/{userid}', [VesselController::class, 'index']);      // existing
        Route::get('/', [VesselController::class, 'getAll']);            // new: get all vessels
        Route::get('/list', [VesselController::class, 'list'])->name('vesselList');            // new: get all vessels
        Route::post('/', [VesselController::class, 'store']);            // existing
        Route::get('/details/{vesselId}', [VesselController::class, 'show']);
        Route::put('/{vesselId}', [VesselController::class, 'update']);  // new: update vessel
        Route::delete('/', [VesselController::class, 'delete']);         // existing
    });


    Route::prefix('cabin')->group(function () {
        Route::get('/', [CabinController::class, 'index']);         // Fetch all cabins
        Route::get('/{id}', [CabinController::class, 'show']);     // Fetch single cabin
        Route::post('/', [CabinController::class, 'store']);       // Create cabin
        Route::put('/{id}', [CabinController::class, 'update']);   // Update cabin
        Route::delete('/{id}', [CabinController::class, 'destroy']); // Delete cabin
    });

    Route::prefix('destinations')->group(function () {
        Route::post('/', [DestinationController::class, 'store']);
        Route::get('/', [DestinationController::class, 'index']);
        Route::get('/{id}', [DestinationController::class, 'show']);
        Route::put('/{id}', [DestinationController::class, 'update']);
        Route::delete('/{id}', [DestinationController::class, 'destroy']);
    });

    Route::prefix('schedules')->group(function () {
        Route::post('/', [ScheduleController::class, 'store']);
        Route::get('/', [ScheduleController::class, 'index']);
        Route::get('/{id}', [ScheduleController::class, 'show']);
        Route::put('/{id}', [ScheduleController::class, 'update']);
        Route::delete('/{id}', [ScheduleController::class, 'destroy']);
    });

    Route::prefix('booking')->group(function () {
        Route::post('/', [BookingController::class, 'store']);
        Route::get('/', [BookingController::class, 'index']);
        Route::get('/{id}', [BookingController::class, 'show']);
        Route::put('/{id}', [BookingController::class, 'update']);
        Route::delete('/{id}', [BookingController::class, 'destroy']);
    });
});
