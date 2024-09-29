<?php



use App\Http\Controllers\admin\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\TempImagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['middleware' => 'admin.guest'], function () {
            Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
            Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');


        });

    Route::group(['middleware' => 'admin.auth'], function () {

        // route cua thang home
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/member-count', [App\Http\Controllers\DashboardController::class, 'getMemberCount']);
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');
        // route cua thang categories
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        // img_temp.create
        Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('img_temp.create');
        
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');



        Route::get('/getSlug', function(Request $request) {
            $slug = '';
            if (!empty($request->title)){
                $slug = Str::slug($request->title);
            }
        
            return response()->json([
                'status' => true,
                'slug' => $slug
            ]);
        })->name('getSlug');
        


    });

    



});

