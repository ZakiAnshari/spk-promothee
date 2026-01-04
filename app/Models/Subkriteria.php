<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    protected $fillable = [
        'kriteria_id','subkriteria_nama', 'subkriteria_berat',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
