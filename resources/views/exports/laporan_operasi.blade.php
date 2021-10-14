@php
 use App\Models\Data_absen_operasi;
 use App\Models\Laporan_operasi;
@endphp
<h3>Laporan operasi tanggal {{$data_pasien->tanggal}}</h3>
<h4>Ruangan {{$data_pasien->data_ruangan->nama_ruangan}}</h4>
<h4>Jam Mulai Operasi {{$data_pasien->waktu}}</h4>
<h4>Jam Selesai Operasi {{$data_pasien->waktu_selesai}}</h4>
<table>
    <tr>
    <td>Nama Pasien</td>
    <td>: {{$data_pasien->nama_pasien}}</td>
    </tr>
    <tr>
    <td>Penyakit</td>
    <td>: {{$data_pasien->data_penyakit->nama_penyakit}}</td>
    </tr>
    <tr>
    <td>Umur Pasien</td>
    <td>: {{$data_pasien->umur}} Tahun</td>
    </tr>
    <tr>
    <td>Jenis Kelamin</td>
    <td>: {{$data_pasien->jk}}</td>
    </tr>
    <tr>
    <td>Alamat Pasien</td>
    <td>: <?= nl2br($data_pasien->alamat)?></td>
    </tr>
    <tr>
    <td>Catatan Pasien</td>
    <td>: <?= nl2br($data_pasien->catatan_pasien)?></td>
    </tr>
    <tr>
    <td>Keterangan Operasi</td>
    <td>: <?= nl2br($data_pasien->ket)?></td>
    </tr>
</table>
<br>
<h3>Data Laporan Pegawai</h3>
<table>
<tr>
<td>No</td>
<td>Nakes</td>
<td>Jabatan</td>
<td>kehadiran</td>
<td>Laporan</td>
</tr>
@foreach ($table as $n => $item)

<tr>
    <td>{{ $n + 1 }}</td>
    <td>{{ $item->users->name }}</td>
    <td>{{ $item->users->user_role->role }}</td>
    @php 
    $cek = Data_absen_operasi::where('data_jadwal_operasi_id', $data_pasien->id)->where('users_id', $item->users_id)->first();
    $ceklaporan = Laporan_operasi::where('data_jadwal_operasi_id', $data_pasien->id)->where('users_id', $item->users_id)->first();
    @endphp
    <td>
    @if($cek == NULL)
    Tidak Hadir
    @else
    Hadir
    @endif
    </td>
    <td>
    @if($ceklaporan == NULL)
    -
    @else
    <?= nl2br($ceklaporan->catatan_operasi) ?>
    @endif
    </td>
    </tr>
@endforeach
</table>








