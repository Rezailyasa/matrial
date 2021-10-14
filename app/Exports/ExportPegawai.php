<?php

namespace App\Exports;

use App\Models\Users;
use App\Models\User_role;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\Exportable;

class ExportPegawai implements FromView
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    
    public function view(): View
    {
        $data['time'] = date('d-M-Y');
        $data['role'] = User_role::find($this->id);
        $data['user'] = Users::where('user_role_id', '=', $this->id)->get();

        return view('exports.export_pegawai', $data);
    }
}