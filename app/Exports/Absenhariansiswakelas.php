<?php

namespace App\Exports;

use App\Models\Data_kelas;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class Absenhariansiswakelas implements FromQuery, WithTitle
{
    private $jur;

    public function __construct(int $jur)
    {
        $this->jur = $jur;
    }
    public function query()
    {
        return Data_kelas::query()->where('data_jurusan_id', $this->jur);
    }
    public function title(): string
    {
        return 'Kelas';
    }
}
