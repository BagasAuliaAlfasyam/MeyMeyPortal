@extends('layouts.app')

@section('content')
	{{ Breadcrumbs::render('users') }}

	<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-between mb-2 mx-1">
        <h1 class="m-0">{{ __('Users') }}</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary" role="button">Tambah</a>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body p-0">

              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-info my-1"> <i class="fa fa-edit"></i> </a>
                        <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.users.delete', $user->id) }}"
                          method="post">
                          @csrf
                          @method('delete')
                          <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
              {{ $users->links() }}
            </div>
          </div>

        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection
