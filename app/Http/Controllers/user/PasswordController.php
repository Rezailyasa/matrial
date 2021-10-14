<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['user'] =  AUTH::user();
         $data['title'] = 'ChangePassword';
         $data['sub_menu'] = '0';
        return view('user.password', $data);
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
        $password = AUTH::user()->password;
        if(Hash::check($request->password, $password)){

         $data['user'] =  AUTH::user();
         $data['title'] = 'ChangePassword';
         $data['sub_menu'] = '0';
        return view('user.password_new', $data);

        }else{

        $request->session()->flash('warna', 'danger');
        $request->session()->flash('status', 'The password you entered is wrong!!');
      
        return redirect()->back();
        }
            

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
        $p = Hash::make($request->password);
              DB::table('users')
              ->where('id', $id)
              ->update(['password' => $p]);

              Auth::logout();
        $request->session()->flush();

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Password changed successfully!!');
              
              return redirect('login');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id = $request->id;
        $cek = Users::find($id);
        if($request->kode == $cek->forgot){

            $request->session()->flash('warna', 'success');
            $request->session()->flash('status', 'Silahkan masukkan password baru anda!');
         $data['user'] =  $cek;
         $data['title'] = 'ChangePassword';
         $data['sub_menu'] = '0';
        return view('user.password_forgot', $data);

        }else{
            $kode = time();
            // Users::where('email', '=', $request->email)->update(['forgot' => $kode]);
            $data['user'] = $cek;   
            
            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Kode Salah!'); 
            return view('forgot', $data);
        }

    }

}
