<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Jadwalpengiriman;
use App\Models\Outlet;
use App\Models\Pengiriman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JadwalpengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jadwalpengiriman = Jadwalpengiriman::join('tb_pengiriman', 'tb_pengiriman.id_pengiriman', 'tb_jadwalpengiriman.id_pengiriman')->join('tb_gudang', 'tb_gudang.id_gudang', 'tb_jadwalpengiriman.id_gudang')->join('tb_outlet', 'tb_outlet.id_outlet', 'tb_jadwalpengiriman.id_outlet')
            ->select('tb_jadwalpengiriman.*', 'tb_pengiriman.*', 'tb_gudang.*', 'tb_outlet.*')
            ->paginate(10);
        return view('jadwalpengiriman/jadwalpengiriman', compact('jadwalpengiriman'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengiriman = Pengiriman::all();
        $gudang = Gudang::all();
        $outlet = Outlet::all();

        return view('jadwalpengiriman.tambah-jadwalpengiriman', compact('pengiriman', 'gudang', 'outlet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengiriman' => 'required',
            'id_pengiriman' => 'required',
            'id_gudang' => 'required',
            'id_outlet' => 'required',
        ]);

        Jadwalpengiriman::create([
            'id_jadwal' => rand(),
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
            'id_pengiriman' => $request->id_pengiriman,
            'id_gudang' => $request->id_gudang,
            'id_outlet' => $request->id_outlet,
        ]);
        return redirect("jadwalpengiriman")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwalpengiriman = Jadwalpengiriman::join('tb_pengiriman', 'tb_pengiriman.id_pengiriman', 'tb_jadwalpengiriman.id_pengiriman')->join('tb_gudang', 'tb_gudang.id_gudang', 'tb_jadwalpengiriman.id_gudang')->join('tb_outlet', 'tb_outlet.id_outlet', 'tb_jadwalpengiriman.id_outlet')
            ->select('tb_pengiriman.*', 'tb_gudang.*', 'tb_outlet.*');
        $jadwalpengiriman = Jadwalpengiriman::find($id);

        $pengiriman = Pengiriman::all();
        $gudang = Gudang::all();
        $outlet = Outlet::all();
        return view('jadwalpengiriman.edit-jadwalpengiriman', compact('jadwalpengiriman', 'pengiriman', 'gudang', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_gudang' => 'required',
            'id_outlet' => 'required',
            'id_pengiriman' => 'required',
        ]);

        $jadwalpengiriman = Jadwalpengiriman::find($id);

        $jadwalpengiriman->update([
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
            'id_pengiriman' => $request->id_pengiriman,
            'id_gudang' => $request->id_gudang,
            'id_outlet' => $request->id_outlet,
        ]);
        return redirect("jadwalpengiriman")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jadwalpengiriman = Jadwalpengiriman::find($id);
        $jadwalpengiriman->delete();
        return redirect("jadwalpengiriman")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $jadwalpengiriman = Jadwalpengiriman::join('tb_pengiriman', 'tb_pengiriman.id_pengiriman', 'tb_jadwalpengiriman.id_pengiriman')->join('tb_gudang', 'tb_gudang.id_gudang', 'tb_jadwalpengiriman.id_gudang')->join('tb_outlet', 'tb_outlet.id_outlet', 'tb_jadwalpengiriman.id_outlet')
            ->select('tb_jadwalpengiriman.*', 'tb_pengiriman.*', 'tb_gudang.*', 'tb_outlet.*')->get();
        $pdf = Pdf::loadview('jadwalpengiriman\laporan-jadwalpengiriman', ['jadwalpengiriman' => $jadwalpengiriman])->setPaper('a4');
        return $pdf->download('laporan-jadwalpengiriman.pdf');
    }
}
