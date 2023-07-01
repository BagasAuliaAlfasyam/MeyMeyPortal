@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('users.add') }}

    <div class="content">
        <div class="container">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama User</label>
                    <input type="text" class="form-control" id="nama" name="name">
                </div>
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="type">Role</label>
                    <select class="custom-select" id="type" name="type">
                        <option selected disabled>Open this select menu</option>
                        <option value="1">Admin</option>
                        <option value="0">Mahasiswa</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection