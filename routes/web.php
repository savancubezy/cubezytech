<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\Home2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OperationidController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('index')->middleware('LoginCheck');

Route::get('/login', [HomeController::class,'login'])->name('login');
Route::post('/login/submit', [HomeController::class,'login_sub'])->name('log_sub');

Route::get('/logout', [HomeController::class,'logout'])->name('logOut');

Route::get('/register', [HomeController::class,'register'])->name('register');
Route::post('/register/submit', [HomeController::class,'reg_store'])->name('reg_sub');

Route::get('/leaving_application', [LeaveController::class,'index'])->name('lea_app')->middleware('Admin');
Route::post('/leaving_application/reject', [LeaveController::class,'deleteapp'])->name('del_app')->middleware('Admin');
Route::post('/leaving_application/accept', [LeaveController::class,'acceptapp'])->name('acceptapp')->middleware('Admin');

Route::get('/view_data', [DataController::class,'viewdata'])->name('viewdata')->middleware('Admin');
// Route::get('/view_data/view_more', [DataController::class,'viewmore'])->name('viewmore');
Route::get('/view_data/view_more/{id}', [DataController::class,'viewmore'])->name('viewmore')->middleware('Admin');

Route::get('/monthly_leaves', [DataController::class,'monleav'])->name('monleav')->middleware('Admin');
Route::post('/monthly_leaves/separes_months', [DataController::class,'sermonstore'])->name('sermon')->middleware('Admin');

Route::get('/employee', [Home2Controller::class,'index'])->name('indexemp')->middleware('Employee');
Route::get('/employee/leaving_application/form', [Home2Controller::class,'form'])->name('leavappform')->middleware('Employee');
Route::post('/employee/leaving_application/form_submit', [Home2Controller::class,'store'])->name('app_sub')->middleware('Employee');
Route::get('/employee/view_mytotalleaves', [Home2Controller::class,'viewmyleaves'])->name('viewmyleave')->middleware('Employee');
Route::get('/view/application/update', [Home2Controller::class,'viewappupdate'])->name('viewappupdate')->middleware('Employee');

Route::get('/employees/opearion', [OperationidController::class,'views'])->name('operationemployee')->middleware('Admin');
Route::post('/employees/opearion/id/delete', [OperationidController::class,'delempid'])->name('delempid')->middleware('Admin');
Route::get('/employees/opearion/id/edit/{id}', [OperationidController::class,'editempid'])->name('editempid')->middleware('Admin');

Route::post('/notice', [NoticeController::class,'store'])->name('addnots')->middleware('Admin');