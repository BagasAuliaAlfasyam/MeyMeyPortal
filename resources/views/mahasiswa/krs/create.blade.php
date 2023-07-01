@extends('layoutUser.app')
@section('main')
  <div class="container main-content p-5 mt-5">

    <form method="post" action="{{ route('mahasiswa.krs.store') }}">
      @csrf
      <div class="form-group row border-bottom pb-4">
        <label for="nim" class="col-sm-2 col-form-label">Nim</label>
        <div class="col-sm-10">
          <input readonly type="text" class="form-control" name="nim" value="{{ auth()->user()->mahasiswa->nim }}" id="nim">
        </div>
      </div>
      <div class="form-group row border-bottom pb-4">
        <label for="tahun_akademik_id" class="col-sm-2 col-form-label">Tahun Akademik</label>
        <div class="col-sm-10">
          <select readonly class="form-control" name="tahun_akademik_id" id="tahun_akademik_id">
            <option readonly value="{{ $tahun_akademik->id }}"> {{ $tahun_akademik->tahun_akademik . $tahun_akademik->semester }}</option>
          </select>
        </div>
      </div>
      <div class="form-group row border-bottom pb-4">
        <label for="mata_kuliah" class="col-sm-2 col-form-label">Mata Kuliah</label>
        <div class="col-sm-10">
          <select name="mata_kuliah_id" class="custom-select" id="mata_kuliah">
            <option selected disabled>Pilih Mata Kuliah</option>
            @foreach ($matkul as $mat)
              <option value="{{ $mat->id }}">{{ $mat->nama_mata_kuliah }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <input type="hidden" name="mahasiswa_id" value="{{ $mhs->id }}">
      <button type="submit" class="btn btn-success">Save</button>
    </form>
  </div>
@endsection
