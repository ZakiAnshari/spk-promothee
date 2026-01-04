<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $fillable = [
        'kriteria_code', 'kriteria_nama', 'kriteria_jenis','kriteria_berat'
    ];

    public function subkriterias()
    {
        return $this->hasMany(Subkriteria::class);
    }

    public static function totalBobot()
    {
        return self::sum('kriteria_berat');
    }

    // Normalisasi Bobot Kriteria (Bobot Relatif)
    public function getBobotNormalisasiAttribute()
    {
        $total = self::totalBobot();
        return $total > 0 ? $this->kriteria_berat / $total : 0;
    }
    
    //Normalisasi Bobot Kriteria (duplikat fungsi pertama)
    public function referensi($matrixNormalisasi)
    {
        $kriterias = Kriteria::all()->keyBy('id');

        $nilai = 0;

        foreach ($matrixNormalisasi as $data) {
            if ($data['fasilitas_id'] == $this->id) {
                $bobot = $kriterias[$data['kriteria_id']]->kriteria_bobot ?? 0;
                $nilai += $data['nilai_normalisasi'] * $bobot;
            }
        }

        return round($nilai, 4); // tampilkan 4 digit desimal
    }

    //Nilai Preferensi Akhir (V)
        public function getKriteriaBobotAttribute()
    {
        $total = self::totalBobot();
        return $total > 0 ? $this->kriteria_berat / $total : 0;
    }

}
