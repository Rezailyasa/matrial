<?php

namespace App\Exports;

use App\Models\Users;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Absenharianguru implements FromView
{

    public function view(): View
    {
        $data['time'] = date('Y-m-d');
        $data['users'] = Users::whereIn('user_role_id', [1, 3, 4, 5, 6, 7, 8, 11])->get();

        return view('exports.data_absen_harian', $data);
    }
}
