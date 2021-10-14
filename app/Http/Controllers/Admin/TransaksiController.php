<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data_barang;
use App\Models\Data_biaya_kirim;
use App\Models\Data_harga;
use App\Models\Data_komisi;
use App\Models\Data_toko;
use App\Models\Transaksi;
use App\Models\Users;
use App\Models\User_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Transaksi';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();
        $data['sales'] = Users::whereIn('user_role_id', [1, 2])->get();
        $data['tokos'] = Data_toko::all();
        $data['transaksi'] = Transaksi::orderBy('id', 'desc')->get();

        return view('admin.transaksi.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tgl = null)
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Transaksi';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->get();
        $data['harga'] = Data_harga::where('is_active', 1)->orderBy('id', 'desc')->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->get();
        $data['komisis'] = Data_komisi::where('is_active', 1)->orderBy('id', 'desc')->get();
        $data['sales'] = Users::whereIn('user_role_id', [1, 2])->get();
        $data['tokos'] = Data_toko::where('is_active', 1)->orderBy('users_id', 'asc')->get();
        $data['barangs'] = Data_barang::where('is_active', 1)->get();
        $data['trx'] = Transaksi::orderBy('id', 'desc')->first();
        $data['tglll'] = $tgl;

        // $tokos = json_encode($data['tokos']);

        return view('admin.transaksi.transaksi', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_invoice' => 'required|unique:transaksi',
        ]);

        if ($request->is_lunas == 'on') {
            $is_lunas = 'Lunas';
        } else {
            $is_lunas = 'Belum Lunas';
        }
        // dd($request->tanggal);
        // $tanggal = date("Y-m-d", strtotime($request->tanggal));

        $totalakhir = $request->harga_jual * 12.6 * $request->totalqty;
        // $u = Data_toko::
        $transaksi = new Transaksi;

        $transaksi->data_barang_id = $request->data_barang_id;
        $transaksi->qty = $request->totalqty;
        $transaksi->data_toko_id = $request->data_toko_id;
        $transaksi->users_id = $request->users_id;
        $transaksi->data_komisi_id = $request->data_komisi_id;
        $transaksi->kelebihankomisi = $request->tambahankomisi;
        $transaksi->data_harga_id = $request->data_harga_id;
        $transaksi->harga_jual = $request->harga_jual;
        $transaksi->no_invoice = $request->no_invoice;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->total = $totalakhir;
        $transaksi->catatan = $request->catatan;
        $transaksi->type_pembayaran = $request->type_pembayaran;
        $transaksi->is_lunas = $is_lunas;
        // $transaksi->save = $request->save;

        $transaksi->save();

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', $request->type . ' berhasil di simpan');

        return redirect('/jadwal');

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
        $h = Data_toko::with('data_biaya_kirim', 'users')->where('id', $id)->first();
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

            'data_barang_id' => $request->data_barang_id,
            'qty' => $request->qty,
            'data_toko_id' => $request->data_toko_id,
            // 'users_id' => $request->users_id,
            'data_komisi_id' => $request->data_komisi_id,
            'data_harga_id' => $request->data_harga_id,
            'harga_jual' => $request->harga_jual,
            'no_invoice' => $request->no_invoice,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'total' => $request->total,
            'catatan' => $request->catatan,
            'type_pembayaran' => $request->type_pembayaran,
            'is_lunas' => $is_lunas,
            // 'save' => $request->save,
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
        $data['barangs'] = Data_barang::where('is_active', 1)->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();
        $data['sales'] = Users::where('user_role_id', 2)->get();
        $data['tokos'] = Data_toko::orderBy('users_id', 'desc')->get();
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
    public function acc(Request $request, $id)
    {
        Transaksi::where('id', $id)->update([
            'acc' => 1,
        ]);

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'berhasil di rubah');

        return redirect('/transaksi');

    }
}
