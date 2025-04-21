<?php

use App\Livewire\Admin\AcademicReport;
use App\Livewire\Admin\AcademicReportResult;
use App\Livewire\Admin\CreateStudent;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ReceivingScholarship;
use App\Livewire\Admin\School;
use App\Livewire\Home\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Login;
use App\Livewire\Lab\TestTesseractOCR;
use App\Livewire\StudentRegister;
use App\Livewire\StudentRegister\ShowStudentRegisterData;
use App\Livewire\StudentRegister\ShowStudentRegisterList;
use App\Livewire\StudentSponsored\ShowAcademicPerformance;
use App\Livewire\StudentSponsored\ShowData;
use App\Livewire\StudentSponsored\ShowStudentImages;
use App\Livewire\StudentSponsored\ShowStudentSponsoredList;
use App\Livewire\User\ShowUserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckLogin;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/Dashboard',function (){
//     return view('admin.Dashboard');
// });
Route::middleware([CheckLogin::class])->group(function (){
    Route::get('/user-data',ShowUserData::class)->name('showUSerData');
    Route::get('/student-register',StudentRegister::class)->name('student_register');
});

Route::get('preview-academicPerformance',function () {
    return view('Admin.report.AcademicPerformanceReport');
})->middleware('CheckAdmin');


Route::get('/admin/student-register-list',ShowStudentRegisterList::class);
Route::get('/admin/dashboard',Dashboard::class)->name('admin.dashboard')->middleware('CheckAdmin');

Route::get('/admin/student-scholarship/{student}',ReceivingScholarship::class)->name('admin.student-scholarship')->middleware('CheckAdmin');
Route::get('/admin/student-sponsored-list',ShowStudentSponsoredList::class)->name('student-sponsored-list')->middleware('CheckAdmin');
Route::get('/admin/academic-report/{student}',AcademicReport::class)->name('admin.academicReport')->middleware('CheckAdmin');
Route::get('/admin/academic-report-result/{student}',AcademicReportResult::class)->name('admin.academicReportResult')->middleware('CheckAdmin');
Route::get('admin/school',School::class)->name('admin.schools')->middleware('CheckAdmin');
Route::get('admin/create-student-view',CreateStudent::class)->name('admin.createStudent');
// Route::get('/admin/student-sponsored-list', function () {
//     return view('livewire.admin.student-sponsored')->layout('Admin.components.layouts.app');
// });

// Route::get('/admin/student-register-data/{student}', function () {
//     return view('Admin.student_regsiter_data');
// });



Route::get('/admin/sponsored-student/{student}',ShowData::class)->name('admin.studentSponsoredData')->middleware('CheckAdmin');
Route::get('/admin/sponsored-student/images/{student}',ShowStudentImages::class)->name('admin.studentSponsoredPhotos')->middleware('CheckAdmin');
Route::get('/admin/sponsored-student/academic-performance/{student}',ShowAcademicPerformance::class)->name('admin.studentSponsored.academicperformance')->middleware('CheckAdmin');

Route::get('/student-register-list',ShowStudentRegisterList::class)->name('studentRegisterList');
// Route::get('/register', function (){
//     return view('home.register');
// });

Route::get('/student-register-data/{student}',ShowStudentRegisterData::class)->name('student.register.data');

Route::get('/register',Register::class)->name('register');

Route::get('/login', function (){
    return view('home.login');
})->name('login');


Route::get('logout',function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

