@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('users.edit', $user) }}

    <div class="content">
      <div class="container">
        <form method="POST" action="{{ route('admin.users.update', [$user]) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="nama">Nama User</label>
              <input type="text" class="form-control" id="nama" name="name" value="{{ $user->name }}">
          </div>
          <div class="form-group">
              <label for="email">E-Mail</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
              <label for="password_confirmation">Password Confirmation</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection