<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $select_khs = DB::table('krs')
            ->select(
                'krs.id', 
                'mata_kuliah.nama_mata_kuliah', 
                'mata_kuliah.kode_mata_kuliah', 
                'mata_kuliah.sks',
                'krs.nilai')
            ->join(
                'mata_kuliah', 
                'mata_kuliah.id', '=', 'krs.mata_kuliah_id')
            ->where(
                'krs.nim', '=', $user->mahasiswa->nim)
            ->get();

        $thn_aka = TahunAkademik::where('status', 'aktif')->first();

        return view('mahasiswa.khs.index', compact('user', 'thn_aka', 'select_khs'));
    }
}
