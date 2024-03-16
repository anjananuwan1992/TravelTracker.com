<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plancontroller;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DivController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ViewPlanController;
use App\Http\Controllers\explorerController;
use App\Http\Controllers\catogoryController;
use App\Http\Controllers\guiderController;
use App\Http\Controllers\adminController;

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



Route::get('/signup', function () {
    return view('signup');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/Explorer', function () {
    return view('Explorer');
});

Route::get('/guiderregistration', function () {
    return view('guiderregistration');
});

Route::get('/Plan', function () {
    return view('Plan');
});

Route::get('/addattractions', function () {
    return view('addattractions');
});


Route::get('/', [CustomAuthController::class, 'home']);

Route::get('/attractions', [catogoryController::class, 'attraction']);

Route::get('/hotels', [catogoryController::class, 'hotel']);

Route::get('/tours', [guiderController::class, 'tour']);

Route::get('/foods', [catogoryController::class, 'food']);

Route::get('/rentals', [catogoryController::class, 'rental']);

Route::get('/shops', [catogoryController::class, 'shop']);

Route::post('/plan', [DivController::class, 'create'])->name('submit.plan');

Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');

Route::get('/registration', [CustomAuthController::class, 'registration'])->middleware('alreadyLoggedIn');

Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');

Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');

Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('/logout', [CustomAuthController::class, 'logout']);

Route::get('/add_post', [BusinessController::class, 'addPost'])->middleware('isLoggedIn');

Route::get('/profile', [BusinessController::class, 'profile'])->middleware('isLoggedIn');

Route::post('/business', [BusinessController::class, 'activebusiness'])->name('active.business');

Route::get('/delete-business/{id}', [BusinessController::class, 'deletebusiness'])->middleware('isLoggedIn');

Route::get('/business', [BusinessController::class, 'pendingbusiness'])->middleware('isAdminLoggedIn');

Route::get('/activebusiness', [BusinessController::class, 'activatedbusiness'])->middleware('isAdminLoggedIn');

Route::post('/activebusiness', [BusinessController::class, 'suspendbusiness'])->name('suspend.business');

Route::get('/add_business', [CustomAuthController::class, 'addBusiness'])->middleware('alreadyLoggedIn');

Route::post('/add_business', [BusinessController::class, 'saveBusiness'])->name('save.business');

Route::post('/dashboard', [PackageController::class, 'savePackage'])->name('save.package');

Route::get('/edit-package/{id}', [CustomAuthController::class, 'editpackage'])->middleware('isLoggedIn');

Route::get('/delete-package/{id}', [CustomAuthController::class, 'deletepackage'])->middleware('isLoggedIn');

Route::post('/edit-package', [CustomAuthController::class, 'updatePackage'])->name('update.package');

Route::get('/edit-package/canceledit', [CustomAuthController::class, 'canceledit']);

Route::get('/admin_panel', [CustomAuthController::class, 'adminpanel'])->middleware('isAdminLoggedIn');

Route::post('/pendingaccounts', [adminController::class, 'activeuser'])->name('active.user');

Route::get('/pendingaccounts', [adminController::class, 'pendingaccounts'])->middleware('isAdminLoggedIn');

Route::post('/activeaccounts', [adminController::class, 'activeuser'])->name('active.user');

Route::get('/delete-user/{id}', [adminController::class, 'deleteuser'])->middleware('isAdminLoggedIn');

Route::get('/activeaccounts', [adminController::class, 'activeaccounts'])->middleware('isAdminLoggedIn');

Route::get('/suspendeduser', [adminController::class, 'suspendeduser'])->middleware('isAdminLoggedIn');

Route::post('/suspendeduser', [adminController::class, 'activeuser2'])->name('active2.user');

Route::get('/adminaccounts', [adminController::class, 'adminaccounts'])->middleware('isAdminLoggedIn');

Route::get('/delete-admin/{id}', [adminController::class, 'deleteadmin'])->middleware('isAdminLoggedIn');

Route::post('/adminaccounts', [adminController::class, 'suspendadmin'])->name('suspend.admin');

Route::get('/suspendedadmin', [adminController::class, 'susadmin'])->middleware('isAdminLoggedIn');

Route::post('/suspendedadmin', [adminController::class, 'activeadmin'])->name('active.admin');

Route::get('/admin', [CustomAuthController::class, 'admin'])->middleware('alreadyAdminLoggedIn');

Route::post('/login-admin', [CustomAuthController::class, 'loginadmin'])->name('login-admin');

Route::get('/add_admins', [CustomAuthController::class, 'addadmin'])->middleware('isAdminLoggedIn');

Route::post('/register-admins', [CustomAuthController::class, 'registeradmin'])->name('add.admin');

Route::get('/adminlogout', [CustomAuthController::class, 'adminlogout']);

Route::get('/view-plan', [ViewPlanController::class, 'viewPlan'])->name('view.plan');

Route::post('/Explorer', [explorerController::class, 'registerExplorerUser'])->name('register-explorer');

Route::get('/addattractions', [explorerController::class, 'addattractionloc'])->middleware('isLoggedIn');

Route::post('/addattractions', [explorerController::class, 'saveattractionlocation'])->name('save.attractionloc');

Route::get('/attractioninfo', [explorerController::class, 'attractioninfo'])->middleware('isLoggedIn');

Route::post('/attractioninfo', [explorerController::class, 'addAttractionToBusiness'])->name('save.addAttraction');

Route::get('/edit-location/{business_id}', [explorerController::class, 'editattraction'])->middleware('isLoggedIn');

Route::post('/edit-location', [explorerController::class, 'updateattraction'])->name('update.attraction');

Route::post('/guiderregistration', [guiderController::class, 'registerguider'])->name('register-guider');

Route::get('/guiderdashboard', [guiderController::class, 'guiderdashboard'])->middleware('isLoggedIn');

Route::post('/guiderdashboard', [guiderController::class, 'savetour'])->name('save.tour');

Route::get('/edit-infomation/{id}', [explorerController::class, 'editinfomation'])->middleware('isLoggedIn');

Route::post('/edit-infomation', [explorerController::class, 'updateinfomation'])->name('update.infomation');

Route::get('/delete-attraction/{id}', [explorerController::class, 'deleteattraction'])->middleware('isLoggedIn');

Route::get('/edit-tour/{id}', [guiderController::class, 'edittour'])->middleware('isLoggedIn');

Route::post('/edit-tour', [guiderController::class, 'updatetour'])->name('update.tour');

Route::get('/delete-tour/{id}', [guiderController::class, 'deletetour'])->middleware('isLoggedIn');






