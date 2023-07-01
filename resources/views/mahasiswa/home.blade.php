@extends('layoutUser.app')

@section('main')
  <div class="container main-content shadow-sm my-2">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
      <h1 class="">Selamat Datang {{ auth()->user()->name }} ツ</h1>
    </div>
  </div> 
@endsection