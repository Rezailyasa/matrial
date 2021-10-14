<?php

namespace App\Exports;

use App\Models\Data_absen;
use App\Models\Users;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Absenharianguruhistory implements FromView
{
    public function __construct($dari, $ke)
    {
        $this->dari = $dari;
        $this->ke = $ke;
    }

    public function view(): View
    {
        $time = $this->dari . '-' . $this->ke;
        $data['time'] = $time;

        $data['users'] = Users::whereIn('user_role_id', [1, 3, 4, 5, 6, 7, 8, 11])->get();
        $data['date'] = Data_absen::whereBetween('tgl_absen', [$this->dari, $this->ke])->get();
        //  = $da->groupBy('tgl_absen')->all();
        //  = $d->all();
        $data['colspan'] = $data['date']->groupBy('tgl_absen')->count();
        // dd($data['date']);
        return view('exports.data_absen_dari_ke', $data);
    }
}
