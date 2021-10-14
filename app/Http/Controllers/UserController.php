<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = AUTH::user();
        $id = AUTH::user()->id;
        $data['role'] = Users::find($id);
        $data['title'] = 'User Profile';
        $data['sub_menu'] = '0';
        // $data['tahun_ajaran'] = Tahun_ajaran::where('is_active', 1)->first();
        // $data['berita'] = Data_berita::orderByDesc('id')->get();

        return view('user.profile', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function notauthorized()
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'UD CIPTA INDAH - Not Authorized';

        return view('user.notauthorized', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'image|mimes:jpg,jpeg,png',
        ]);
        $file = $request->file('file');
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img/profile_user';

        // upload file

        $id = AUTH::User()->id;
        $gambarlama = AUTH::User()->image;
        if ($file) {
            $namafile = time() . '-' . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namafile);
            if ($gambarlama != "user.webp") {
                unlink(public_path('img/profile_user/' . $gambarlama));
            }
            Users::where('id', $id)
                ->update(['name' => $request->name, 'telepon' => $request->telepon, 'alamat' => $request->alamat, 'maps' => $request->maps, 'image' => $namafile]);
        } else {
            Users::where('id', $id)
                ->update(['name' => $request->name, 'telepon' => $request->telepon, 'alamat' => $request->alamat, 'maps' => $request->maps]);
        }
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Your profile has been successfully edited!');

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = AUTH::user();
        $id = AUTH::user()->id;
        $data['role'] = Users::find($id);
        $data['title'] = 'User Profile';
        $data['sub_menu'] = '0';
        return view('user.editprofile', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Users::where('id', $id)
        //     ->update(['mode_gelap' => $request->mode]);

        $this->validate($request, [
            'file' => 'image|mimes:jpg,jpeg,png',
        ]);
        $file = $request->file('file');
// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images/profile_user/';

// upload file

        $id = AUTH::User()->id;
        $gambarlama = AUTH::User()->image;
        if ($file) {
            $f = str_replace(" ", "-", $file->getClientOriginalName());
            $namafile = $f;
            $file->move($tujuan_upload, $f);
            if ($gambarlama != "user.webp") {
                unlink(public_path('images/profile_user/' . $gambarlama));
            }
            Users::where('id', $id)
                ->update(['image' => $f, 'name' => $request->name, 'email' => $request->email]);
        } else {
            Users::where('id', $id)
                ->update(['name' => $request->name, 'email' => $request->email]);
        }

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Your profile has been successfully edited!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addFacePattern($id)
    {
        $user = Users::find($id);
        $title = "Add Face Pattern";
        $sub_menu = '';
        return view('admin.setting_user.add-face-pattern-form', compact('user', 'title', 'sub_menu'));
    }

    public function saveFacePattern(Request $request)
    {
        $this->validate($request, [
            'label' => 'required',
            'pattern' => 'required',
        ]);

        $userMail = $request->get('label');
        $user = Users::where('email', base64_decode($userMail))->firstOrFail();
        $user->pola_wajah = $request->get('pattern');

        if ($user->save()) {
            $request->session()->flash('warna', 'success');
            $request->session()->flash('status', 'Pola wajah Anda telah disimpan!');

            return redirect()->route('recognize-pattern');
        } else {
            $request->session()->flash('warna', 'warning');
            $request->session()->flash('status', 'Silahkan ulangi proses pengambilan pola wajah.');

            return redirect()->back();
        }
    }

    public function recognizePattern()
    {
        $user = Auth::user();
        $title = "Recognize Face Pattern";
        $sub_menu = '';

        $usersFacePattern = Users::select(['pola_wajah', 'email', 'name'])
            ->where('pola_wajah', '!=', null)
            ->get();

        $face_pattern_models = [];
        $users = [];
        foreach ($usersFacePattern as $userFace) {
            $userMail = base64_encode($userFace->email);
            $users[$userMail] = $userFace->name;
            $face_pattern_models[] = $userFace->pola_wajah;
        }

        return view('admin.setting_user.pattern-recognition', compact('user', 'title', 'sub_menu', 'face_pattern_models', 'users'));
    }

}
