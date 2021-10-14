<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\User_role;
use App\Models\Data_kelas;
use App\Models\Tahun_ajaran;
use App\Models\Setting_kelas_siswa;

class UserVerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $data['user'] =  AUTH::user();
        $data['title'] = 'User Verify';
        $data['sub_menu'] = '0';
        $data['menu'] = 'Dhasboard';
        $data['data'] = Users::where([['user_role_id', '=', 2], ['is_active', '=', 1]])->limit(100)->get();
        $data['datacek'] = Users::where([['user_role_id', '=', 2], ['is_active', '=', 1]])->first();
        $data['role_data'] = User_role::where('id', '!=', 2)->where('id', '!=', 10)->get();
        $data['semua_data'] = 1;
        return view('admin.user_verify.user_verify', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_change_role(Request $request, $role_id, $users_id)
    {
        Users::where('id', $users_id)->update(['user_role_id' => $role_id]);
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'User berhasil diverifikasi!');
        return redirect('/user_verify');
    }
    public function setting_student_fix(Request $request, $users_id, $kelas_id)
    {
        $tahun_ajaran = Tahun_ajaran::where('is_active', 1)->first();
        Users::where('id', $users_id)->update(['user_role_id' => 9]);
        $in = new Setting_kelas_siswa;
        $in->users_id = $users_id;
        $in->data_kelas_id = $kelas_id;
        $in->tahun_ajaran_id = $tahun_ajaran->id;
        $in->save();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'User berhasil diverifikasi!');
        return redirect('/user_verify');
    }
    public function setting_kelas_student($users_id)
    {

        $data['user'] =  AUTH::user();
        $data['title'] = 'User Verify';
        $data['sub_menu'] = '0';
        $data['menu'] = 'Dhasboard';
        $data['student'] = Users::find($users_id);

        return view('admin.user_verify.setting_student', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $data['user'] =  AUTH::user();
        $data['title'] = 'User Verify';
        $data['sub_menu'] = '0';
        $data['menu'] = 'Dhasboard';
        $data['data'] = Users::where([['user_role_id', '=', 2], ['is_active', '=', 1]])->get();
        $data['datacek'] = Users::where([['user_role_id', '=', 2], ['is_active', '=', 1]])->first();
        $data['role_data'] = User_role::where('id', '!=', 2)->where('id', '!=', 10)->get();
        $data['semua_data'] = 2;

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Seluruh data berhasil ditampilkan!');
        return view('admin.user_verify', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cari_kelas($value)
    {
        $data = Data_kelas::where('nama_kelas', 'LIKE', '%' . $value . '%')->get();
        return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
