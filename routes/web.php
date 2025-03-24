<?php

use App\Livewire\Admin\Dashboard;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/Dashboard',function (){
//     return view('admin.Dashboard');
// });



Route::get('/admin/student-register-list',ShowStudentRegisterList::class);
Route::get('/admin/dashboard',Dashboard::class);
Route::get('/test-modal',function () {
    return view('testModal');
});

Route::get('/admin/student-sponsored-list',ShowStudentSponsoredList::class);

// Route::get('/admin/student-register-data/{student}', function () {
//     return view('Admin.student_regsiter_data');
// });

Route::get('/admin/sponsored-student/{student}',ShowData::class)->name('admin.studentSponsoredData');
Route::get('/admin/sponsored-student/images/{student}',ShowStudentImages::class)->name('admin.studentSponsoredPhotos');
Route::get('/admin/sponsored-student/academic-performance/{student}',ShowAcademicPerformance::class)->name('admin.studentSponsored.academicperformance');

Route::get('/student-register-list',ShowStudentRegisterList::class)->name('studentRegisterList');
// Route::get('/register', function (){
//     return view('home.register');
// });

Route::get('/student-register-data/{student}',ShowStudentRegisterData::class)->name('student.register.data');
Route::get('/user-data',ShowUserData::class)->name('showUSerData');
Route::get('/register',Register::class);

Route::get('/login', function (){
    return view('home.login');
})->name('login');

Route::get('/student-register',StudentRegister::class);
    

Route::get('lab/testTesseractORC',TestTesseractOCR::class);