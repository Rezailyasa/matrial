@php
use App\Models\Data_absen;
use App\Models\Data_kelas;
use App\Models\Data_jurusan;
use App\Models\Setting_kelas_siswa;

$jurusans = Data_jurusan::all();
$jur = $jurusans->groupBy('nama_jurusan');
@endphp




{{-- kelas 12 --}}
<table id="multi-filter-select" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>{{ $tahun_ajaran->tahun }}</th>
        </tr>
        <tr>
            <th colspan="6">
                <center>Data Absensi Siswa Tanggal {{ $time }}</center>
            </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Jurusan</th>
            <th>Kelas</th>
            <th>Tingkat</th>
            <th>Nama</th>
            <th>Absen</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $no => $user)
            @php
                $kelas = Data_kelas::find($user->setting_kelas_siswa->data_kelas_id);
                // $kel = $kelass->groupBy('nama_kelas');
            @endphp
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $kelas->data_jurusan->nama_jurusan }}</td>
                <td>{{ $kelas->nama_kelas }}</td>
                <td>{{ $kelas->tingkat_kelas }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    @php
                        // $sks = Setting_kelas_siswa::where(['tahun_ajaran_id' => $tahun_ajaran->id, 'users_id' => $user->id])->first();
                        $hadir = Data_absen::whereDate('created_at', $time)
                            ->where('users_id', $user->id)
                            ->get();
                    @endphp
                    @if ($hadir == null)
                        Tidak Hadir
                    @else
                        @foreach ($hadir as $c)
                            {{ $c->status }}, {{ $c->jam_absen }}, {{ $c->keterangan }} <br>
                        @endforeach
                    @endif
                </td>
            </tr>
        @endforeach
        <br>
    </tbody>
</table>
<br>
{{-- end kelas 12 --}}
