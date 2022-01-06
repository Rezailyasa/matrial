<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = Users::orderBy('id', 'asc')->get();

        return view('index', compact('users'));
    }

}
