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

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = AUTH::user();
        $data['title'] = 'Settings';
        $data['menu'] = User_menu::all();
        $data['hargas'] = Data_harga::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['barangs'] = Data_barang::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['harga'] = Data_harga::orderBy('id', 'desc')->where('is_active', 1)->first();
        $data['biayakirim'] = Data_biaya_kirim::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['komisis'] = Data_komisi::orderBy('id', 'desc')->where('is_active', 1)->get();
        $data['sales'] = Users::whereIn('user_role_id', [1, 2, 3])->orderBy('user_role_id', 'asc')->get();
        $data['salesaktif'] = Users::whereIn('user_role_id', [2, 1])->orderBy('user_role_id', 'asc')->get();
        $data['tokos'] = Data_toko::where('is_active', 1)->get();
        // dd($data['harga']);
        $data['dari'] = date('d-m-Y');
        $data['ke'] = date('d-m-Y');

        return view('admin.settings.settings', $data);

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
        // dd($request->type);
        if ($request->type == 'harga') {

            $harga = new Data_harga;

            $harga->harga = $request->harga;
            $harga->keterangan = $request->keterangan;
            $harga->tanggal = date('d-m-Y');

            $harga->save();
        } elseif ($request->type == 'barang') {

            $barang = new Data_barang;

            $barang->nama_barang = $request->nama_barang;
            $barang->tipe_barang = $request->tipe_barang;
            $barang->ukuran = $request->ukuran;
            $barang->keterangan = $request->keterangan;

            $barang->save();

        } elseif ($request->type == 'kirim') {

            $cek = Data_biaya_kirim::where('daerah', $request->daerah)->first();
            if ($cek == null) {

                $kirim = new Data_biaya_kirim;

                $kirim->biaya_kirim = $request->biaya_kirim;
                $kirim->daerah = $request->daerah;
                $kirim->tanggal = date('d-m-Y');

                $kirim->save();

            } else {

                Data_biaya_kirim::where('daerah', $request->daerah)
                    ->update([
                        'biaya_kirim' => $request->biaya_kirim,
                        'tanggal' => date('d-m-Y'),
                    ]);
            }

        } elseif ($request->type == 'toko') {
            $toko = new Data_toko;

            $toko->nama_toko = $request->nama_toko;
            $toko->nama_pemilik = $request->nama_pemilik;
            $toko->no_tlp = $request->no_tlp;
            $toko->alamat = $request->alamat;
            $toko->users_id = $request->users_id;
            $toko->data_biaya_kirim_id = $request->data_biaya_kirim_id;

            $toko->save();

        } else {

            $komisi = new Data_komisi;

            $komisi->margin = $request->margin;
            $komisi->komisi = $request->komisi;
            $komisi->tanggal = date('d-m-Y');

            $komisi->save();

        }

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', $request->type . ' berhasil di simpan');

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
        $user_role_id = Users::find($id);
        if ($user_role_id->user_role_id == 2) {
            $role_id = 3;
            $status = 'di nonaktifkan';
        } else {
            $role_id = 2;
            $status = 'di aktifkan';
        }

        Users::where('id', $id)
            ->update([
                'user_role_id' => $role_id,
            ]);

        return redirect()->back()
            ->with('warna', 'success')
            ->with('status', $user_role_id->name . ' berhasil ' . $status);
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
        if ($request->type == 'toko') {
            Data_toko::where('id', $id)
                ->update([
                    'nama_toko' => $request->nama_toko,
                    'nama_pemilik' => $request->nama_pemilik,
                    'no_tlp' => $request->no_tlp,
                    'alamat' => $request->alamat,
                    'users_id' => $request->users_id,
                    'data_biaya_kirim_id' => $request->data_biaya_kirim_id,
                ]);
        } elseif ($request->type == 'barang') {
            Data_barang::where('id', $id)
                ->update([
                    'nama_barang' => $request->nama_barang,
                    'tipe_barang' => $request->tipe_barang,
                    'ukuran' => $request->ukuran,
                    'keterangan' => $request->keterangan,
                ]);
        } else {
            Data_komisi::where('id', $id)
                ->update([
                    'margin' => $request->margin,
                    'komisi' => $request->komisi,
                    'tanggal' => date('d-m-Y'),
                ]);

        }

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', $request->type . ' berhasil di update');

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
        if ($request->type == 'harga') {
            Data_harga::where('id', $id)->update([
                'is_active' => 0,
            ]);
        } elseif ($request->type == 'kirim') {
            Data_biaya_kirim::where('id', $id)->update([
                'is_active' => 0,
            ]);
        } elseif ($request->type == 'barang') {
            Data_barang::where('id', $id)->update([
                'is_active' => 0,
            ]);
        } elseif ($request->type == 'sales') {
            Users::where('id', $id)->delete();
        } elseif ($request->type == 'toko') {
            Data_toko::where('id', $id)->update([
                'is_active' => 0,
            ]);
        } else {
            Data_komisi::where('id', $id)->update([
                'is_active' => 0,
            ]);
        }

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', $request->type . ' berhasil di hapus');

        return redirect()->back();
    }

    public function salesdetail($id, $dari, $ke)
    {
        $data['dari'] = $dari;
        $data['ke'] = $ke;
        $data['user'] = AUTH::user();
        $data['title'] = 'Settings';
        $data['menu'] = User_menu::all();
        $data['sales'] = Users::whereIn('user_role_id', [1, 2])->where('id', $id)->orderBy('user_role_id', 'asc')->first();
        $data['transaksi'] = Transaksi::where('users_id', $id)->count();
        $data['transaksii'] = Transaksi::where('users_id', $id)->whereBetween('tanggal', [$data['dari'], $data['ke']])->first();
        $data['transaksis'] = Transaksi::where('users_id', $id)->whereBetween('tanggal', [$data['dari'], $data['ke']])->get();

        $data['totalakhir'] = $data['transaksis']->sum('total');

        $data['totalkomisi'] = Transaksi::addSelect(['komisi' => Data_komisi::selectRaw('sum(komisi) as totalkomisi')
            // ->where('users_id', $id)
                ->whereColumn('data_komisi_id', 'data_komisi.id')
            // ->whereBetween('tanggal', [$data['dari'], $data['ke']])
                ->groupBy('data_komisi_id'),
        ])
            ->where('users_id', $id)
            ->orderBy('data_komisi_id', 'DESC')
            ->get()
            ->sum('komisi');

        $data['komisi'] = Transaksi::addSelect(['komisi' => Data_komisi::selectRaw('sum(komisi) as totalkomisi')
            // ->where('users_id', $id)
                ->whereColumn('data_komisi_id', 'data_komisi.id')
            // ->whereBetween('tanggal', [$data['dari'], $data['ke']])
                ->groupBy('data_komisi_id'),
        ])
            ->where('users_id', $id)
            ->whereBetween('tanggal', [$data['dari'], $data['ke']])
            ->orderBy('data_komisi_id', 'DESC')
            ->get()
            ->sum('komisi');

        // $data['komisis'] = Data_komisi::orderBy('id', 'desc')->get();

        return view('admin.settings.salesdetail', $data);

    }
    public function filtersales(Request $request)
    {
        $data['dari'] = date('d-m-Y', strtotime($request->dari));
        $data['ke'] = date('d-m-Y', strtotime($request->ke));
        // dd($request->id);

        return redirect('/salesdetail/' . $request->id . '/' . $data['dari'] . '/' . $data['ke']);

    }
}
