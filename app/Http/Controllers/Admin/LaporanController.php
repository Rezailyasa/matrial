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
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dari = date('Y-m-d');
        $ke = date('Y-m-d');

        return redirect('/laporan/' . $dari . '/' . $ke);
    }
    public function laporan($dari, $ke)
    {
        // $dari = date("Y-m-d", strtotime($dari));
        // $ke = date("Y-m-d", strtotime($ke));
        // dd($ke);
        $data['user'] = AUTH::user();
        $data['title'] = 'Laporan';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->where('is_active', 1)->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['sales'] = Users::where('user_role_id', 2)->get();
        $data['tokos'] = Data_toko::where('is_active', 1)->get();
        $data['transaksi'] = Transaksi::whereBetween(DB::raw('DATE(tanggal)'), [$dari, $ke])->get();
        // $data['transaksi'] = Transaksi::whereBetween('tanggal', [$dari, $ke])->get();
        $data['dari'] = $dari;
        $data['ke'] = $ke;
        $totalqty = Transaksi::whereBetween('tanggal', [$dari, $ke])
            ->get()
            ->sum('qty');

        $data['totalakhir'] = $data['transaksi']->sum('total');
        $totalm = Transaksi::addSelect(['harga' => Data_harga::selectRaw('sum(harga) as totalharga')
            // ->where('users_id', $id)
                ->whereColumn('data_harga_id', 'data_harga.id')
                ->groupBy('data_harga_id'),
        ])
            ->whereBetween('tanggal', [$dari, $ke])
            ->orderBy('data_harga_id', 'DESC')
            ->get()
            ->sum('harga');

        $data['totalmodal'] = $totalm * 12.6 * $totalqty;

        $data['totalkomisi'] = Transaksi::addSelect(['komisi' => Data_komisi::selectRaw('sum(komisi) as totalkomisi')
                ->whereColumn('data_komisi_id', 'data_komisi.id')
                ->whereBetween('tanggal', [$dari, $ke])
                ->groupBy('data_komisi_id'),
        ])
            ->orderBy('data_komisi_id', 'DESC')
            ->get()
            ->sum('komisi');

        $data['totalkomisitambahan'] = Transaksi::whereBetween('tanggal', [$dari, $ke])
            ->get()
            ->sum('kelebihankomisi');

        // dd($data['totalkomisitambahan']);

        return view('admin.laporan.index', $data);

    }
    function print($dari, $ke) {
        $data['user'] = AUTH::user();
        $data['title'] = 'Laporan';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->where('is_active', 1)->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['sales'] = Users::where('user_role_id', 2)->get();
        $data['tokos'] = Data_toko::where('is_active', 1)->get();
        $data['dari'] = $dari;
        $data['ke'] = $ke;
        $data['transaksi'] = Transaksi::whereBetween('tanggal', [$dari, $ke])->orderBy('id', 'desc')->get();
        $data['totalakhir'] = $data['transaksi']->sum('total');
        $data['totalmodal'] = Transaksi::addSelect(['harga' => Data_harga::selectRaw('sum(harga) as totalharga')
            // ->where('users_id', $id)
                ->whereColumn('data_harga_id', 'data_harga.id')
                ->groupBy('data_harga_id'),
        ])
        // ->where('users_id', $id)
            ->whereBetween('tanggal', [$dari, $ke])
            ->orderBy('data_harga_id', 'DESC')
            ->get()
            ->sum('harga');

        $data['totalkomisi'] = Transaksi::addSelect(['komisi' => Data_komisi::selectRaw('sum(komisi) as totalkomisi')
            // ->where('users_id', $id)
                ->whereColumn('data_komisi_id', 'data_komisi.id')
                ->whereBetween('tanggal', [$dari, $ke])
                ->groupBy('data_komisi_id'),
        ])
        // ->where('users_id', $id)
            ->orderBy('data_komisi_id', 'DESC')
            ->get()
            ->sum('komisi');

        // dd($data['totalakhir']);

        return view('admin.laporan.print', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        return redirect('/laporan/' . $data['dari'] . '/' . $data['ke']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $h = Data_komisi::where('id', $id)->first();
        return json_encode($h);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $h = Data_toko::with('data_biaya_kirim')->where('id', $id)->first();
        return json_encode($h);
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
        if ($request->is_lunas == 'on') {
            $is_lunas = 'Lunas';
        } else {
            $is_lunas = 'Belum Lunas';
        }

        Transaksi::where('id', $id)->update([

            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'data_toko_id' => $request->data_toko_id,
            'users_id' => $request->users_id,
            'data_komisi_id' => $request->data_komisi_id,
            'data_harga_id' => $request->data_harga_id,
            'no_invoice' => $request->no_invoice,
            'tanggal' => $request->tanggal,
            'total' => $request->total,
            'catatan' => $request->catatan,
            'type_pembayaran' => $request->type_pembayaran,
            'is_lunas' => $is_lunas,
            'save' => $request->save,
        ]);

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'berhasil di rubah');

        return redirect('/transaksi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        Transaksi::where('id', $id)->delete();

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', $request->type . ' berhasil di hapus');

        return redirect()->back();
    }
    public function editinvoice($id)
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Transaksi';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();
        $data['sales'] = Users::where('user_role_id', 2)->get();
        $data['tokos'] = Data_toko::all();
        $data['trx'] = Transaksi::where('id', $id)->orderBy('id', 'desc')->first();

        return view('admin.transaksi.edit', $data);
    }
    public function noinvoice($id)
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Transaksi';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();
        $data['sales'] = Users::where('user_role_id', 2)->get();
        $data['tokos'] = Data_toko::all();
        $data['trx'] = Transaksi::where('id', $id)->orderBy('id', 'desc')->first();

        return view('admin.transaksi.noinvoice', $data);
    }
    public function printinvoice($id)
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Transaksi';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();
        $data['sales'] = Users::where('user_role_id', 2)->get();
        $data['tokos'] = Data_toko::all();
        $data['trx'] = Transaksi::where('id', $id)->orderBy('id', 'desc')->first();

        return view('admin.transaksi.print', $data);
    }
}
