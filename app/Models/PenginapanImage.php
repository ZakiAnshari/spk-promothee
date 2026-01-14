<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenginapanImage extends Model
{
    protected $fillable = ['penginapan_id', 'image'];

    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class);
    }
}