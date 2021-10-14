<?php

namespace App\Exports;

use App\Models\Users;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\Exportable;

class HarianExportUser implements FromView
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    
    public function view(): View
    {
        $data['time'] = date('Y-m-d');
        $data['data_dokter'] = Users::where('user_role_id', '=', $this->id)->get();

        return view('exports.data_absen_harian', $data);
    }
}