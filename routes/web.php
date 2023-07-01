<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\KhsController;
use App\Http\Controllers\Admin\KrsController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\InputNilaiController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\ProgramStudyController;
use App\Http\Controllers\Admin\TahunAkademikController;
use App\Http\Controllers\Admin\TranskripNilaiController;
use App\Http\Controllers\Mahasiswa\KhsController as MahasiswaKhsController;
use App\Http\Controllers\Mahasiswa\KrsController as MahasiswaKrsController;

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

Route::get('/', function () { return view('welcome'); });

Auth::routes();


Route::group(['middleware' => ['auth','user-access:admin'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('admin-home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
    // jurusan crud
    Route::resource('jurusan', JurusanController::class)->except('show');
    Route::resource('program_study', ProgramStudyController::class)->except('show');
    Route::resource('mata_kuliah', MataKuliahController::class)->except('show');
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('tahun_akademik', TahunAkademikController::class);
    // krs
    Route::get('krs/create/{nim}/{tahun_akademik}', [KrsController::class, 'create'])->name('krs.create');
    Route::get('krs', [KrsController::class, 'index'])->name('krs.index');
    Route::post('krs', [KrsController::class, 'find'])->name('krs.find');
    Route::post('krs/store', [KrsController::class, 'store'])->name('krs.store');
    Route::get('krs/{krs:id}/edit', [KrsController::class, 'edit'])->name('krs.edit');
    Route::put('krs/{krs:id}', [KrsController::class, 'update'])->name('krs.update');
    Route::delete('krs/{krs:id}', [KrsController::class, 'destroy'])->name('krs.destroy');
    // khs
    Route::get('khs', [KhsController::class, 'index'])->name('khs.index');
    Route::post('khs', [KhsController::class, 'find'])->name('khs.find');
    // input nilai
    Route::get('input_nilai',[InputNilaiController::class, 'index'])->name('input_nilai.index');
    Route::post('input_nilai',[InputNilaiController::class, 'all'])->name('input_nilai.all');
    Route::post('input_nilai/store',[InputNilaiController::class, 'store'])->name('input_nilai.store');
    // transkrip nilai
    Route::get('transkrip_nilai', [TranskripNilaiController::class, 'index'])->name("transkrip_nilai.index");
    Route::post('transkrip_nilai', [TranskripNilaiController::class, 'find'])->name("transkrip_nilai.find");

    Route::view('about', 'about')->name('about');
    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user:id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user:id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user:id}', [UserController::class, 'delete'])->name('users.delete');
    // Profile
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

});


Route::group(['middleware' => ['auth', 'user-access:mahasiswa'], 'prefix' => 'mahasiswa', 'as' => 'mahasiswa.'], function(){
    Route::get('/mahasiswa-home', [HomeController::class, 'mahasiswa'])->name('home');
    Route::get('mahasiswa-krs', [MahasiswaKrsController::class, 'index'])->name('krs');
    Route::get('mahasiswa-krs/create', [MahasiswaKrsController::class, 'create'])->name('krs.create');
    Route::post('mahasiswa-krs/create', [MahasiswaKrsController::class, 'store'])->name('krs.store');
    Route::delete('mahasiswa/krs/{krs:id}', [MahasiswaKrsController::class, 'destroy'])->name('krs.delete');

    Route::get('mahasiswa-khs', [MahasiswaKhsController::class, 'index'])->name('khs');

    route::get('comingsoon', function(){
        return view ('mahasiswa.transkip.index');
    })->name('comingsoon');
}); 
