<?php

namespace App\Http\Controllers\role;
use App\Models\User_role;
use App\Models\User_menu;
use App\Models\User_access_menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleController extends Controller
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
        
         $data['user'] =  AUTH::user();
         $data['title'] = 'Role & Access';
         $data['sub_menu'] = '0';
         $data['data'] =  User_role::all();
       	 $data['menu'] =  User_menu::all();
        return view('role.role', $data);
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
        $role = new User_role;

        $role->role = $request->role;

        $role->save();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'role berhasil dibuat!');
      
        return redirect()->back();

    }

    public function access(Request $request)
    {
    	// dd($request->all());
       User_access_menu::where('user_role_id', $request->id_role)->delete();
       $menu = User_menu::all();
       foreach ($menu as $mn) {
	
	   $post = 'menu'.$mn->id.'';
       $n = $request[$post];
		if ($n) {
				$menu = new User_access_menu;
		        $menu->user_menu_id = $n;
				$menu->user_role_id = $request->id_role;
		        $menu->save();
		}
       }
 		$request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Access berhasil di simpan!');
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
 			User_role::where('id', $id)
          ->update(['role' => $request->role]);
    
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Role berhasil diedit!');
      
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
       User_role::where('id', $id)->delete();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Role berhasil dihapus!');
      
        return redirect()->back();
    }
}
