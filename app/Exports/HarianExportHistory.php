<?php

namespace App\Exports;

use App\Models\Users;
use App\Models\User_role;
use App\Models\Data_absen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;

class HarianExportHistory implements FromView
{
    use Exportable;

    public function __construct($id,$tahun,$bulan)
    {
        $this->id = $id;
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }

    
    public function view(): View
    {
        $time = $this->tahun . '-' . $this->bulan;
        $data['time'] = $time;
        $data['role'] = User_role::find($this->id);
        
        $data['pegawai'] = Users::where('user_role_id', $this->id)->get();
        $data['date'] = DB::select('SELECT DAY(`tgl_absen`) as `tanggal_baru`, `tgl_absen` FROM `data_absen` WHERE `tgl_absen` LIKE :tanggal GROUP BY `tgl_absen`', ['tanggal' => '%' . $time . '%']);
        $data['colspan'] = Data_absen::where('tgl_absen', 'LIKE', '%'.$time.'%')->groupBy('tgl_absen')->count();
        // dd($data['colspan'] );
        return view('exports.data_absen_history', $data);
    }
}