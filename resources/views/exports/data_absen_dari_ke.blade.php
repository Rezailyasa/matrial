@php
use App\Models\Data_absen;
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
            <th>Jabatan</th>
            <th>Nama</th>
            {{-- <th>Kehadiran</th> --}}
            @php
                $r = $date->groupby('tgl_absen')->all();
            @endphp
            @foreach ($r as $item)
                <th class="text-center">{{ $item[0]->tgl_absen }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $no => $p)

            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $p->user_role->role }}</td>
                <td>{{ $p->name }}</td>

                @php
                    $r = $date->groupby('tgl_absen')->all();
                @endphp
                @foreach ($r as $item)
                    @php
                        $cek = Data_absen::where([['users_id', $p->id], ['tgl_absen', $item[0]->tgl_absen]])->get();
                    @endphp <td class="text-center">
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
