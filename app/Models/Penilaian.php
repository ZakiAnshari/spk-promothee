<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'penginapan_id',
        'kriteria_id',
        'subkriteria_id',
        'nilai'
    ];

    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class, 'penginapan_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    public function subkriteria()
    {
        return $this->belongsTo(Subkriteria::class, 'subkriteria_id');
    }

  
}
