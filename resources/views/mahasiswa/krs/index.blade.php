@extends('layoutUser.app')

@section('main')
  <div class="container main-content my-2 py-2">
    <center class="mb-2">
      <legend class="mt-3"><strong>KARTU RENCANA STUDI</strong></legend>

      <table>
        <tr>
          <td><strong>NIM</strong></td>
          <td>&nbsp;: {{ $user->mahasiswa->nim }}</td>
        </tr>
        <tr>
          <td><strong>Nama Lengkap</strong></td>
          <td>&nbsp;: {{ $user->mahasiswa->nama_lengkap }}</td>
        </tr>
        <tr>
          <td><strong>Program Study</strong></td>
          <td>&nbsp;: {{ $user->mahasiswa->program_study->nama_prody }}</td>
        </tr>
        <tr>
          <td><strong>Tahun Akademik (Semester)</strong></td>
          <td>&nbsp;: {{ $thn_aka->tahun_akademik }} {{ $thn_aka->semester }}</td>
        </tr>
      </table>
    </center>
    <table class="table table-bordered table-hover table-striped mt-4">
      <tr>
        <th>NO</th>
        <th>KODE MATA KULIAH</th>
        <th>NAMA MATA KULIAH</th>
        <th>SKS</th>
        <th>ACTION</th>
      </tr>
      @php $total_sks = 0; @endphp

      @foreach ($select_krs as $krs)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $krs->kode_mata_kuliah }}</td>
          <td>{{ $krs->nama_mata_kuliah }}</td>
          <td>{{ $krs->sks }}</td>
          <td>
            <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('mahasiswa.krs.delete', $krs->id) }}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
            </form>
          </td>
        </tr>

        @php $total_sks += $krs->sks @endphp
      @endforeach

      <tr>
        <td colspan="3" align="right"><strong>Jumlah SKS</strong></td>
        <td colspan="2"><strong>{{ $total_sks }}</strong></td>
      </tr>
      <a class="btn btn-primary" href="{{ route('mahasiswa.krs.create') }}">Tambah KRS</a>
    </table>
  </div>
@endsection
