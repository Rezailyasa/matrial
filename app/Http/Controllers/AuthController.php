<?php

namespace App\Http\Controllers;

use App\Mail\Forgot;
use App\Mail\RSUD_Gunung_jati_Cirebon;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('auth');
    }
    public function forgotpassword()
    {

        return view('forgotpassword');
    }
    public function verified(Request $request, $token, $email)
    {

        $user = Users::find($token);
        if ($email == $user->email && $token == $user->email_verified_at) {
            Users::where(['email' => $email, 'email_verified_at' => $token])->update(['is_active' => 1, 'email_verified_at' => time()]);
            $request->session()->flash('warna', 'success');
            $request->session()->flash('status', 'Yeeeyyy!, Akun anda berhasil diaktivasi Silahkan Login!');
            return redirect('/login');
        } else {
            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Akun gagal diaktifasi atau sudah pernah diaktivasi hubungi Admin atau Petugas!');
            return redirect('/login');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->user_role_id == 1) {
                if (Auth::user()->is_active == 1) {
                    return redirect('/dashboard');
                } else {

                    Auth::logout();
                    $request->session()->flush();
                    $request->session()->flash('email', $request->email);
                    $request->session()->flash('warna', 'danger');
                    $request->session()->flash('status', 'Account has not been activated, please check your email to activate your account!');

                    return redirect('/login');
                }
            } else if (Auth::user()->user_role_id == 2) {
                if (Auth::user()->is_active == 1) {
                    return redirect('/home');
                } else {

                    Auth::logout();
                    $request->session()->flush();
                    $request->session()->flash('email', $request->email);
                    $request->session()->flash('warna', 'danger');
                    $request->session()->flash('status', 'Account has not been activated, please check your email to activate your account!');

                    return redirect('/login');
                }
            } else {
                return redirect('/notauthorized');
            }
        } else {

            $request->session()->flash('password', $request->password);
            $request->session()->flash('email', $request->email);
            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Periksa kembali email dan password anda!');
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {
        // $a = AUTH::user();
        // $data['user'] = Users::find($a->id);
        // // dd($a);
        Auth::logout();
        $request->session()->flush();

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Kamu berhasil keluar');
        return redirect('/login');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registerAdd(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|unique:users|max:255',
            ],
            [
                'email.unique' => '*' . $request->email . ' sudah terdaftar!',
            ]
        );
        $verfy = time();
        $user = new Users;
        $user->id = $verfy;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = "user.webp";
        $user->alamat = "Belum Di Input";
        $user->mode_gelap = 2;
        $user->user_role_id = 2;
        $user->is_active = 1;
        // $user->permohonan_akun = null;
        $user->email_verified_at = $verfy;
        $user->password = Hash::make($request->password);
        $user->save();
        $data = ['nama' => $request->name, 'token' => $verfy, 'email' => $request->email];
        $email = $request->email;
        $kirim = Mail::to($email)->send(new RSUD_Gunung_jati_Cirebon($data));
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Account registration is successful, please check your email to confirm that it is you!');
        return redirect('/login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cek = Users::where('email', '=', $request->email)->first();

        if ($cek == null) {
            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Email tidak ditemukan!');
            return redirect('/login');
        } else {
            $request->session()->flash('warna', 'success');
            $request->session()->flash('status', 'Kode akses telah dikirim ke email anda, silahkan priksa email anda!');
            $kode = time();
            Users::where('email', '=', $request->email)->update(['forgot' => $kode]);
            $email = $request->email;
            $data = ['kode' => $kode];
            $kirim = Mail::to($email)->send(new Forgot($data));
            $data['user'] = $cek;
            return view('forgot', $data);
        }
    }
}
