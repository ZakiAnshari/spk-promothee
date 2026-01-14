<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kriteria;
use App\Models\Fasilitas;
use App\Models\Penginapan;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $penginapanCount = Penginapan::count();
        $kriteriaCount = Kriteria::count();
        $userCount = User::count();
        $subkriteriaCount = Subkriteria::count();

        return view('admin.dashboard.index',[

            'penginapan_count' => $penginapanCount,
            'subkriteria_count' => $subkriteriaCount,
            'kriteria_count' => $kriteriaCount,
            'user_count' => $userCount,
            // 'rusakberat_count' => $rusakberatCount,

        ]);
    }
}
