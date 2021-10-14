<?php

namespace App\Exports;

use App\Models\Tahun_ajaran;
use App\Models\Users;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Absenhariansiswa implements FromView
{

    public function view(): View
    {
        $data['time'] = date('Y-m-d');
        $data['users'] = Users::where('user_role_id', 9)->get();
        $data['tahun_ajaran'] = Tahun_ajaran::where('is_active', 1)->first();

        return view('exports.data_absen_harian_siswa', $data);
    }
}
