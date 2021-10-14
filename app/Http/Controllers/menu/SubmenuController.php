<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use App\Models\User_menu;
use App\Models\User_sub_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\DB;

class SubmenuController extends Controller
{

    // public function __construct()
    // {
    //    if(AUTH::user('user_role_id') != 1){
    //     return redirect()->back();
    //    }
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['user'] = AUTH::user();
        $data['title'] = 'SubMenu';
        $data['submenu'] = User_sub_menu::all();
        $data['sub_menu'] = '0';
        $data['menu'] = User_menu::all();
        return view('menu.sub_menu', $data);

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
        $sub = new User_sub_menu;

        $sub->url = $request->url;
        $sub->icon = $request->icon;
        $sub->title = $request->title;
        $sub->user_menu_id = $request->menu;

        $sub->save();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Menu berhasil dibuat!');

        return redirect()->back();

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
        $sub = User_sub_menu::find($id);

        $sub->title = $request->title;
        $sub->user_menu_id = $request->menu;
        $sub->icon = $request->icon;
        $sub->url = $request->url;

        $sub->save();

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Menu berhasil diedit!');

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        User_sub_menu::where('id', $id)->delete();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Menu berhasil dihapus!');

        return redirect()->back();

    }
}
