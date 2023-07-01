<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KrsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $select_krs = DB::table('krs')
            ->select('krs.id', 'mata_kuliah.nama_mata_kuliah', 'mata_kuliah.kode_mata_kuliah', 'mata_kuliah.sks')
            ->join('mata_kuliah', 'mata_kuliah.id', '=', 'krs.mata_kuliah_id')
            ->where('krs.nim', '=', $user->mahasiswa->nim)
            ->get();

        $thn_aka = TahunAkademik::where('status', 'aktif')->first();

        return view('mahasiswa.krs.index', compact('user', 'thn_aka', 'select_krs'));
    }

    public function create()
    {
        $nim = auth()->user()->mahasiswa->nim;
        $tahun_akademik = TahunAkademik::where('status', 'aktif')->first();
        $mhs = Mahasiswa::where('nim', $nim)->first();
        $matkul = MataKuliah::get(['id', 'nama_mata_kuliah']);

        return view('mahasiswa.krs.create', compact('matkul', 'tahun_akademik', 'mhs'));
    }

    public function store(Request $request)
    {
        $req = $request->validate([
            'nim'               => 'required',
            'nilai'             => 'nullable',
            'tahun_akademik_id' => 'required',
            'mata_kuliah_id'    => 'required',
            'mahasiswa_id'      => 'required',
        ]);

        $req['nilai'] = 0;
        Krs::create($req);

        return redirect()
            ->route('mahasiswa.krs')
            ->with([
                'message' => 'Mata kuliah berhasil ditambah!',
                'alert-type' => 'success',
            ]);
    }

    public function destroy(Krs $krs)
    {
        $krs->delete();

        return redirect()
            ->route('mahasiswa.krs')
            ->with(['message' => 'Mata Kuliah berhasil dihapus!', 'alert-type' => 'success']);
    }
}
