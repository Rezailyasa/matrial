<?php

namespace App\Http\Controllers;

use App\Exports\Absenharianguru;
use App\Exports\Absenharianguruhistory;
use App\Exports\Absenhariansiswa;
use App\Exports\Absenhariansiswahistory;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportabsenharianguru()
    {
        $date = date('d-M-Y');
        return Excel::download(new Absenharianguru, 'Absensi_guru&staff_tanggal_' . $date . '.xlsx');
    }
    public function exportabsenharianguruhistory($dari, $ke)
    {
        $date = $dari . '-' . $ke;
        return Excel::download(new Absenharianguruhistory($dari, $ke), 'Absensi_guru&staff_tanggal_' . $date . '.xlsx');
    }
    public function exportexportabsenhariansiswa()
    {
        $date = date('d-M-Y');
        return Excel::download(new Absenhariansiswa, 'Absensi_siswa_tanggal _' . $date . '.xlsx');

    }
    public function exportabsenhariansiswahistory($dari, $ke)
    {
        $date = $dari . '-' . $ke;
        return Excel::download(new Absenhariansiswahistory($dari, $ke), 'Absensi_siswa_tanggal_' . $date . '.xlsx');
    }
}
