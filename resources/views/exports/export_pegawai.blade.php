
<h3>Data {{$role->role}} per tanggal {{$time}}</h3>

<table>
<tr>
    <td>No</td>
    <td>Nama</td>
    <td>Email</td>
    <td>Telepon</td>
    <td>Alamat</td>
</tr>
@foreach($user as $no => $item)
<tr>
<td>{{$no+1}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->email}}</td>
    <td>{{$item->telepon}}</td>
    <td>{{$item->alamat}}</td>
</tr>
@endforeach
</table>