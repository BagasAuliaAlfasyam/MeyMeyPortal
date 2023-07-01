@extends('layoutUser.app')

@section('main')
  <div class="container main-content my-2 py-2">
    <center class="mb-2">
      <legend class="mt-3"><strong>KARTU HASIL STUDI</strong></legend>

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
        <th>NILAI</th>
        <th>SKOR</th>
      </tr>
      @php
          $total_sks = 0;
          $total_nilai = 0;
          function skorNilai($nilai, $sks)
          {
              if ($nilai == 'A') {
                  $skor = 4 * $sks;
              } elseif ($nilai == 'B') {
                  $skor = 3 * $sks;
              } elseif ($nilai == 'C') {
                  $skor = 2 * $sks;
              } elseif ($nilai == 'D') {
                  $skor = 1 * $sks;
              } else {
                  $skor = 0;
              }
              return $skor;
          }
        @endphp
        @foreach ($select_khs as $khs)
          <tr>
            <td width="20px">{{ $loop->iteration }}</td>
            <td>{{ $khs->kode_mata_kuliah }}</td>
            <td>{{ $khs->nama_mata_kuliah }}</td>
            @php
              $total_sks += $khs->sks;
              $total_nilai += skorNilai($khs->nilai, $khs->sks);
            @endphp
            <td>{{ $khs->sks }}</td>
            <td>{{ $khs->nilai }}</td>
            <td>{{ skorNilai($khs->nilai, $khs->sks) }}</td>
          </tr>
        @endforeach

      <tr>
        <td colspan="3" align="right"><strong>Jumlah SKS</strong></td>
        <td colspan="1"><strong>{{ $total_sks }}</strong></td>
        <td colspan="1"><strong>{{ $total_nilai }}</strong></td>
        <td colspan="1"><strong>Skor</strong></td>
      </tr>
    </table>
    <div class="my-2">
      Index Prestasi: {{ number_format($total_nilai / $total_sks, 2) }}
    </div>
  </div>
@endsection
