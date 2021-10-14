<h1>Halo {{ $data['nama'] }}</h1>
<h2>Selamat Akun Anda berhasil dibuat</h2>
@php
    $token = $data['token'];
    $email = $data['email'];
@endphp
<p>Untuk mulai mengunakan akun anda silahkan aktivasi akun anda terlebih dahulu.</p><a
    href="{{ url('/verify/'.$token.'/'.$email) }}">...Klik Disini...</a>
