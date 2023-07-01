<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'mata_kuliah';

    protected $guarded = ['id'];

    public function program_study()
    {
        return $this->belongsTo(ProgramStudy::class);
    }

    public function mata_kuliah() {
        return $this->morphToMany(Krs::class, 'mata_kuliah_id');
    }
}
