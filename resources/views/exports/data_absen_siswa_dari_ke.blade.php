@php
use App\Models\Data_absen;
use App\Models\Data_kelas;
@endphp

<h3>Data Absensi {{ $time }}</h3>

<table id="basic-datatables" class="display table table-striped table-hover">
    <thead>

        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th colspan="{{ $colspan }}" align="center">Tanggal</th>

        </tr>
        <tr>
            <th>No</th>
            <th>Jurusan</th>
            <th>Kelas</th>
            <th>Tingkat</th>
            <th>Nama</th>
            <th>Absen</th>
            @php
            $r = $date->groupby('tgl_absen')->all();
            @endphp
            @foreach ($r as $item)
            <th class="text-center">{{ $item[0]->tgl_absen }}</th>
            @endforeach
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
            @php
            $r = $date->groupby('tgl_absen')->all();
            @endphp
            @foreach ($r as $item)
            @php
            $cek = Data_absen::where([['users_id', $user->id], ['tgl_absen', $item[0]->tgl_absen]])->get();
            @endphp
            <td class="text-center">
                @if ($cek == null)
                -
                @else
                @foreach ($cek as $c)
                {{ $c->status }}, {{ $c->jam_absen }}, {{ $c->keterangan }} <br>
                @endforeach
                @endif
            </td>
            @endforeach
        </tr>

        @endforeach

    </tbody>
</table>