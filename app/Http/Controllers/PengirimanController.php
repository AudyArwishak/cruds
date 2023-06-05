<?php

namespace App\Http\Controllers;

use App\Models\Gula;
use App\Models\Outlet;
use App\Models\Pengiriman;
use App\Models\Supir;
use App\Models\Truk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengiriman = Pengiriman::join('tb_truk', 'tb_truk.id_truk', 'tb_pengiriman.id_truk')->join('tb_supir', 'tb_supir.id_supir', 'tb_pengiriman.id_supir')->join('tb_gula', 'tb_gula.id_gula', 'tb_pengiriman.id_gula')
            ->join('tb_outlet', 'tb_outlet.id_outlet', 'tb_pengiriman.id_outlet')
            ->select('tb_pengiriman.*', 'tb_truk.*', 'tb_supir.*', 'tb_gula.*', 'tb_outlet.*')
            ->paginate(10);
        return view('pengiriman/pengiriman', compact('pengiriman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $truk = Truk::all();
        $supir = Supir::all();
        $gula = Gula::all();
        $outlet = Outlet::all();

        return view('pengiriman.tambah-pengiriman', compact('truk', 'supir', 'gula', 'outlet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_truk' => 'required',
            'id_supir' => 'required',
            'id_gula' => 'required',
            'id_outlet' => 'required',
            'jumlah_kg' => 'required',
        ]);

        Pengiriman::create([
            'id_pengiriman' => rand(),
            'id_truk' => $request->id_truk,
            'id_supir' => $request->id_supir,
            'id_gula' => $request->id_gula,
            'id_outlet' => $request->id_outlet,
            'jumlah_kg' => $request->jumlah_kg,
        ]);
        return redirect("pengiriman")->with("message", "Data berhasil disimpan");
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
        $pengiriman = Pengiriman::join('tb_truk', 'tb_truk.id_truk', 'tb_pengiriman.id_truk')->join('tb_supir', 'tb_supir.id_supir', 'tb_pengiriman.id_supir')->join('tb_gula', 'tb_gula.id_gula', 'tb_pengiriman.id_gula')
            ->join('tb_outlet', 'tb_outlet.id_outlet', 'tb_pengiriman.id_outlet')
            ->select('tb_truk.*', 'tb_supir.*', 'tb_gula.*', 'tb_outlet.*');
        $pengiriman = Pengiriman::find($id);

        $truk = Truk::all();
        $supir = Supir::all();
        $gula = Gula::all();
        $outlet = Outlet::all();
        return view('pengiriman.edit-pengiriman', compact('pengiriman', 'truk', 'supir', 'gula', 'outlet'));

        // return view('pengiriman.edit-pengiriman', compact('pengiriman', 'truk', 'supir', 'gula', 'outlet'));

        // return view('pengiriman.edit-pengiriman', compact('pengiriman', 'truk', 'supir', 'gula', 'outlet'));

        // return view('pengiriman.edit-pengiriman', compact('pengiriman', 'truk', 'supir', 'gula', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_truk' => 'required',
            'id_supir' => 'required',
            'id_outlet' => 'required',
            'id_gula' => 'required',
            'jumlah_kg' => 'required',
        ]);

        $pengiriman = Pengiriman::find($id);

        $pengiriman->update([
            'id_pengiriman' => rand(),
            'id_truk' => $request->id_truk,
            'id_supir' => $request->id_supir,
            'id_outlet' => $request->id_outlet,
            'id_gula' => $request->id_gula,
            'jumlah_kg' => $request->jumlah_kg,
        ]);
        return redirect("pengiriman")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengiriman = Pengiriman::find($id);
        $pengiriman->delete();
        return redirect("pengiriman")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $pengiriman = Pengiriman::join('tb_truk', 'tb_truk.id_truk', 'tb_pengiriman.id_truk')->join('tb_supir', 'tb_supir.id_supir', 'tb_pengiriman.id_supir')->join('tb_gula', 'tb_gula.id_gula', 'tb_pengiriman.id_gula')
            ->join('tb_outlet', 'tb_outlet.id_outlet', 'tb_pengiriman.id_outlet')
            ->select('tb_pengiriman.*', 'tb_truk.*', 'tb_supir.*', 'tb_gula.*', 'tb_outlet.*')->get();
        $pdf = Pdf::loadview('pengiriman\laporan-pengiriman', ['pengiriman' => $pengiriman])->setPaper('a4');
        return $pdf->download('laporan-pengiriman.pdf');
    }
}
