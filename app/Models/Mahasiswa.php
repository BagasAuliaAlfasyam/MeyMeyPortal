<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $guarded = ['id'];

    public function program_study()
    {
        return $this->belongsTo(ProgramStudy::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function krs() {
        return $this->hasOne(Krs::class, 'mahasiswa_id');
    }

    public function tahun_akademik(){
        return $this->belongsTo(TahunAkademik::class);
    }
}