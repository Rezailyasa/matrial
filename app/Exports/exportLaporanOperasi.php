<?php

namespace App\Exports;

use App\Models\Data_jadwal_operasi;
use App\Models\Detail_jadwal_operasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\Exportable;

class exportLaporanOperasi implements FromView
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    
    public function view(): View
    {
        $data['time'] = date('Y-m-d');
        $data['data_pasien'] = Data_jadwal_operasi::find($this->id);
        $data['table'] = Detail_jadwal_operasi::where('data_jadwal_operasi_id', $this->id)->get();
        return view('exports.laporan_operasi', $data);
    }
}