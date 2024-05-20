<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\SmantiPlusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/periode2022-2023', function () {
    return view('sanskara.index');
})->name('sanskara');
Route::get('/periode2022-2023/filosofi', function () {
    return view('sanskara.filosofi');
})->name('filosofi-sanskara');
Route::get('/periode2022-2023/kepengurusan', function () {
    return view('sanskara.pengurus');
})->name('pengurus-sanskara');

// Route::get('/', function () {
    //     return view('welcome');
    // })->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/filosofi-niskala', function () {
    return view('niskala.filosofi-niskala');
})->name('filosofi-niskala');
Route::get('/filosofi-adhyana', function () {
    return view('niskala.filosofi-adhyana');
})->name('filosofi-adhyana');

Route::get('/smantiPlus', [SmantiPlusController::class, 'index']);
Route::get('/result', [SmantiPlusController::class, 'searchResult']);
Route::get('/smantiPlus/explore', [SmantiPlusController::class, 'explore']);
Route::get('/smantiPlus/searchByType/{slug}', [SmantiPlusController::class, 'searchByType']);
Route::get('/smantiPlus/searchByTag/{slug}', [SmantiPlusController::class, 'searchByTag']);
Route::get('/smantiPlus/detail-info/{slug}', [SmantiPlusController::class, 'detail']);

Route::middleware('OnlyGuest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating'])->name('loginProses');
    
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth:administrator,student')->group(function () {
    Route::post('/comment', [SmantiPlusController::class, 'comment']);
    Route::post('/replyComment', [SmantiPlusController::class, 'replyComment']);
    Route::delete('/deleteComment/{id}', [SmantiPlusController::class, 'deleteComment']);
    Route::middleware('MidAdministrator')->group(function () {
        
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
        Route::get('/profile-admin', [ProfileController::class,'profileAdmin']);
        Route::get('/edit-profile-admin', [ProfileController::class,'editProfileAdmin']);
        Route::put('/edit-profile-admin/{slug}/process', [AdminController::class,'updateProfileAdmin']);
        
        Route::get('/info', [InfoController::class,'index']);
        Route::get('/info-archived', [InfoController::class,'infoArchived']);
        Route::get('/info-add', [InfoController::class,'add']);
        Route::post('/addInfo-proses',[InfoController::class,'store']);
        Route::get('/info-detail/{slug}', [InfoController::class,'detail']);
        Route::put('/editInfo/{slug}', [InfoController::class,'update']);
        Route::put('/archive-info-byAdmin/{slug}', [InfoController::class,'archive']);
        Route::put('/publish-byAdmin/{slug}', [InfoController::class,'publish']);
        Route::delete('/deleteInfo/{slug}', [InfoController::class,'destroy']);

        Route::get('/type', [TypeController::class,'index']);
        Route::post('/type', [TypeController::class,'add']);
        Route::put('/type-edit/{slug}',[TypeController::class,'edit']);
        Route::post('/type-delete/{slug}',[TypeController::class,'delete']);

        Route::get('/category', [CategoryController::class,'index']);
        Route::post('/category', [CategoryController::class,'add']);
        Route::put('/category-edit/{slug}',[CategoryController::class,'edit']);
        Route::post('/category-delete/{slug}',[CategoryController::class,'delete']);
        
        Route::get('/logoutAdministrator', [AuthController::class,'logoutAdministrator']);
        
        Route::get('/requestRoleList', [UserController::class,'requestRoleList']);
        Route::put('/requestRole-approve/{slug}',[UserController::class,'approveRequest']);

        Route::middleware('OnlyAdmin')->group(function () {
            Route::get('/users-grid', [UserController::class,'index']);
            Route::get('/users-list', [UserController::class,'list']);
            Route::get('/userDetail/{slug}', [UserController::class,'detail']);
            Route::put('/user-editStatus/{slug}',[UserController::class,'editStatus']);
            Route::put('/editRole-user/{slug}',[UserController::class,'editRole']);
            Route::delete('/deleteUser/{slug}',[UserController::class,'destroy']);
            
            Route::get('/admin-grid', [AdminController::class,'index']);
            Route::get('/admin-list', [AdminController::class,'list']);
            Route::get('/admin-add', [AdminController::class,'add']);
            Route::post('/admin-add/process', [AdminController::class,'store']);
            Route::get('/adminDetail/{slug}', [UserController::class,'detail']);
            Route::put('/admin-editStatus/{slug}',[AdminController::class,'editStatus']);
            Route::delete('/deleteAdmin/{slug}',[AdminController::class,'destroy']);
        });
    });
    Route::middleware('MidUser')->group(function () {
        Route::get('/profile', [ProfileController::class,'index']);
        Route::get('/edit-profile', [ProfileController::class,'edit']);
        Route::put('/edit-profile-save/{slug}', [UserController::class,'editProfile']);
        Route::post('/addToCollection/info/{slug}/post', [CollectionController::class,'addToCollection']);
        Route::delete('/addToCollection/info/{slug}/destroy', [CollectionController::class,'deleteToCollection']);
        Route::get('/profile/created', [ProfileController::class,'created']);
        Route::get('/archived', [ProfileController::class,'archived']);
        
        
        Route::put('/requestRole',[ProfileController::class,'requestRole']);
        
        Route::post('/change-password', [UserController::class,'changePassword']);
        
        Route::middleware('OnlyWriter')->group(function () {
            Route::get('/addInfo', [SmantiPlusController::class,'add']);
            Route::get('/edit-info/{slug}', [SmantiPlusController::class,'edit']);
            Route::post('/addInfo/process', [SmantiPlusController::class,'store']);
            Route::put('/edit-info/{slug}/process', [SmantiPlusController::class,'update']);
            Route::put('/archive-info/{slug}', [InfoController::class,'archive']);
            Route::put('/publish/{slug}', [InfoController::class,'publish']);
            Route::delete('/delete-info/{slug}', [InfoController::class,'destroy']);
            Route::post('/type-add', [TypeController::class,'add']);
            Route::post('/category-add', [CategoryController::class,'add']);
        });
        Route::get('/logoutStudent', [AuthController::class,'logoutStudent']);
    });
});