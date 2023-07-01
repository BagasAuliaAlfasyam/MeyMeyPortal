<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Mahasiswa;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('admin.admin.home'));
});

// Home > Users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Users', route('admin.users.index'));
});

// Home > Users > [Add]
Breadcrumbs::for('users.add', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Tambah', route('admin.users.create'));
});

// Home > Users > [Edit]
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users');
    $trail->push('Edit', route('admin.users.edit', $user));
});

// Home > Jurusan > 
Breadcrumbs::for('jurusan', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Jurusan', url('admin/jurusan'));
});

// Home > Jurusan > [Add]
Breadcrumbs::for('jurusan.add', function (BreadcrumbTrail $trail) {
    $trail->parent('jurusan');
    $trail->push('Tambah', url('admin/jurusan/create'));
});

// Home > Jurusan > [Edit]
Breadcrumbs::for('jurusan.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('jurusan');
    $trail->push('Edit', url('admin/jurusan/edit'));
});

// Home > Prodi > 
Breadcrumbs::for('prodi', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Program Study', url('admin/program_study'));
});

// Home > Prodi > [Add]
Breadcrumbs::for('prodi.add', function (BreadcrumbTrail $trail) {
    $trail->parent('prodi');
    $trail->push('Tambah', url('admin/program_study/create'));
});

// Home > Prodi > [Edit]
Breadcrumbs::for('prodi.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('prodi');
    $trail->push('Edit', url('admin/program_study/edit'));
});

// Home > Matkul > 
Breadcrumbs::for('matkul', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mata Kuliah', url('admin/mata_kuliah'));
});

// Home > Matkul > [Add]
Breadcrumbs::for('matkul.add', function (BreadcrumbTrail $trail) {
    $trail->parent('matkul');
    $trail->push('Tambah', url('admin/mata_kuliah/create'));
});

// Home > Matkul > [Edit]
Breadcrumbs::for('matkul.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('matkul');
    $trail->push('Edit', url('admin/mata_kuliah/edit'));
});

// Home > Mahasiswa > 
Breadcrumbs::for('mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mahasiswa', route('admin.mahasiswa.index'));
});

// Home > Mahasiswa > [Add]
Breadcrumbs::for('mahasiswa.add', function (BreadcrumbTrail $trail) {
    $trail->parent('mahasiswa');
    $trail->push('Tambah', route('admin.mahasiswa.create'));
});

// Home > Mahasiswa > [Edit]
Breadcrumbs::for('mahasiswa.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('mahasiswa');
    $trail->push('Edit', url('admin/mahasiswa/edit'));
});

// Home > Mahasiswa > [Detail]
Breadcrumbs::for('mahasiswa.show', function (BreadcrumbTrail $trail) {
    $trail->parent('mahasiswa');
    $trail->push('Detail', url('admin/mahasiswa/show'));
});

// Home > Thn Aka > 
Breadcrumbs::for('thn-aka', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tahun Akademik', route('admin.tahun_akademik.index'));
});

// Home > Thn Aka > [Add]
Breadcrumbs::for('thn-aka.add', function (BreadcrumbTrail $trail) {
    $trail->parent('thn-aka');
    $trail->push('Tambah', route('admin.tahun_akademik.create'));
});

// Home > Thn Aka > [Edit]
Breadcrumbs::for('thn-aka.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('thn-aka');
    $trail->push('Edit', url('admin/tahun_akademik/edit'));
});

// Home > KRS > 
Breadcrumbs::for('krs', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('KRS (Search)', route('admin.krs.index'));
});

// Home > KRS > 
Breadcrumbs::for('krs.show', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('KRS (Mahasiswa)', route('admin.krs.find'));
});

// Home > KRS > [Add]
Breadcrumbs::for('krs.add', function (BreadcrumbTrail $trail) {
    $trail->parent('krs');
    $trail->push('Tambah', route('admin.tahun_akademik.create'));
});

// Home > KRS > [Edit]
Breadcrumbs::for('krs.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('krs');
    $trail->push('Edit', url('admin/tahun_akademik/edit'));
});

// Home > Nilai > 
Breadcrumbs::for('nilai', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Nilai (Search)', route('admin.input_nilai.index'));
});

// Home > KHS > 
Breadcrumbs::for('khs', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('KHS', route('admin.khs.index'));
});

