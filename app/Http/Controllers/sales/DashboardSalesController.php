<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Models\Data_komisi;
use App\Models\Transaksi;
use App\Models\User_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dari'] = date('Y-m-d');
        $data['ke'] = date('Y-m-d');
        $data['user'] = AUTH::user();
        $data['title'] = 'Dashboard';
        $data['menu'] = User_menu::all();
        $data['transaksi'] = Transaksi::where('users_id', $data['user']->id)->whereBetween('tanggal', [$data['dari'], $data['ke']])->count();
        $data['transaksii'] = Transaksi::where('users_id', $data['user']->id)->whereBetween('tanggal', [$data['dari'], $data['ke']])->get();
        $data['komisi'] = Transaksi::addSelect(['komisi' => Data_komisi::selectRaw('sum(komisi) as totalkomisi')
                ->whereColumn('data_komisi_id', 'Data_komisi.id')
                ->whereBetween('tanggal', [$data['dari'], $data['ke']])
                ->groupBy('data_komisi_id'),
        ])
            ->where('users_id', $data['user']->id)
            ->orderBy('data_komisi_id', 'DESC')
            ->get()
            ->sum('komisi');

        // dd($data['komisi']);
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();

        return view('sales.dashboard', $data);

    }
    public function komisi($dari, $ke)
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Dashboard';
        $data['menu'] = User_menu::all();
        $data['transaksi'] = Transaksi::where('users_id', $data['user']->id)->whereBetween('tanggal', [$dari, $ke])->count();
        $data['transaksii'] = Transaksi::where('users_id', $data['user']->id)->whereBetween('tanggal', [$dari, $ke])->get();
        $data['komisi'] = Transaksi::addSelect(['komisi' => Data_komisi::selectRaw('sum(komisi) as totalkomisi')
                ->whereColumn('data_komisi_id', 'Data_komisi.id')
                ->groupBy('data_komisi_id'),
        ])
            ->where('users_id', $data['user']->id)
            ->whereBetween('tanggal', [$dari, $ke])
            ->orderBy('data_komisi_id', 'DESC')
            ->get()
            ->sum('komisi');

        $data['dari'] = $dari;
        $data['ke'] = $ke;

        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();

        return view('sales.dashboard', $data);

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
        $data['dari'] = date('Y-m-d', strtotime($request->dari));
        $data['ke'] = date('Y-m-d', strtotime($request->ke));

        return redirect('/komisi/' . $data['dari'] . '/' . $data['ke']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Dashboard';
        $data['menu'] = User_menu::all();
        $data['transaksi'] = Transaksi::where('users_id', $data['user']->id)->whereDay('created_at', date('d'))->count();
        $data['transaksii'] = Transaksi::where('users_id', $data['user']->id)->whereDay('created_at', date('d'))->get();
        $data['komisi'] = Transaksi::addSelect(['komisi' => Data_komisi::selectRaw('sum(komisi) as totalkomisi')
                ->whereColumn('data_komisi_id', 'Data_komisi.id')
                ->whereDay('created_at', date('d'))
                ->groupBy('data_komisi_id'),
        ])
            ->orderBy('data_komisi_id', 'DESC')
            ->get()
            ->sum('komisi');

// dd($customers);
        // dd($has);

        return view('sales.dashboard', $data);
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
    public function update(Request $request, $id)
    {

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
    public function jadwal()
    {
        $data['minggu'] = date('Y-W');
        $data['date'] = date('Y-m-d');
        $start = date("Y-m-d", strtotime('monday this week', strtotime($data['date'])));
        $end = date("Y-m-d", strtotime('sunday this week', strtotime($data['date'])));
        $data['user'] = AUTH::user();
        $data['title'] = 'Jadwal Pengiriman';
        $data['menu'] = User_menu::all();
        $data['tottransaksi'] = Transaksi::whereBetween('tanggal', [$start, $end])->count();
        return view('sales.jadwal', $data);
    }
}
