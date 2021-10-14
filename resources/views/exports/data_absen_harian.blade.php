@php
use App\Models\Data_absen;
@endphp
<table id="multi-filter-select" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th colspan="6">
                <center>Data Absensi Guru dan Staf Tanggal {{ $time }}</center>
            </th>


        </tr>
        <tr>
            <th>No</th>
            <th>Jabatan</th>
            <th>Nama</th>
            <th>Absen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $no => $user)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $user->user_role->role }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    @php
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
    </tbody>
</table>
