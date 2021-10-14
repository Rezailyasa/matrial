<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data_biaya_kirim;
use App\Models\Data_harga;
use App\Models\Data_komisi;
use App\Models\Data_toko;
use App\Models\Transaksi;
use App\Models\Users;
use App\Models\User_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Dashboard';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();
        $data['sales'] = Users::whereIn('user_role_id', [1, 2])->count();
        $data['saless'] = Users::whereIn('user_role_id', [1, 2])->get();
        $data['tokos'] = Data_toko::all();
        $data['transaksi'] = Transaksi::orderBy('id', 'desc')->count();
        $data['trk'] = Transaksi::orderBy('id', 'desc')->limit(3)->get();
        $data['users'] = Transaksi::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');

        return view('admin.dashboard.dashboard', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $tujuan_upload = 'images/jurusan';

// upload file

        // $id = AUTH::User()->id;
        // $gambarlama = AUTH::User()->image;
        if ($file) {
            $namafile = time() . '-' . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namafile);

            $datajurusan = new Data_jurusan;

            $datajurusan->nama_jurusan = $request->nama_jurusan;
            $datajurusan->deskripsi = $request->deskripsi;
            $datajurusan->image = $namafile;

            $datajurusan->save();

        }
        // dd($datajurusan);

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
        $data['title'] = 'Jurusan';
        $data['submenu'] = User_sub_menu::all();
        $data['sub_menu'] = '0';
        $data['menu'] = User_menu::all();
// $data['tahun_ajaran'] = Tahun_ajaran::all();
        $data['data_jurusan'] = Data_jurusan::find($id);
        $data['data_jurusans'] = Data_jurusan::all();

        return view('admin.pembelajaran.settings.datamaster.jurusanedit', $data);

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

        $this->validate($request, [
            'file' => 'image|mimes:jpg,jpeg,png',
        ]);
        $file = $request->file('file');
// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images/jurusan';

// upload file

        $gambarlama = Data_jurusan::find($id);
        // $gambarlama = AUTH::User()->image;
        if ($file) {
            $namafile = time() . '-' . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namafile);

            // if (($gambarlama != "noimage.png") || ($gambarlama != null)) {
            //     unlink(public_path('images/jurusan/' . $gambarlama->image));
            // }

            Data_jurusan::where('id', $id)
                ->update([
                    'nama_jurusan' => $request->nama_jurusan,
                    'deskripsi' => $request->deskripsi,
                    'image' => $namafile,
                ]);
        }
        Data_jurusan::where('id', $id)
            ->update([
                'nama_jurusan' => $request->nama_jurusan,
                'deskripsi' => $request->deskripsi,
            ]);

// dd($datajurusan);

        return redirect('/jurusan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Data_jurusan::where('id', $id)->delete();

        return redirect()->back();

    }
}
