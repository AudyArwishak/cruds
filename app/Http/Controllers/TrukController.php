<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $truk = Truk::paginate(10);
        return view('truk/truk', compact('truk'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('truk/tambah-truk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_truk' => 'required',
            'kapasitas_truk' => 'required',
            'plat_nomor' => 'required',
        ]);

        Truk::create([
            'id_truk' => rand(),
            'nama_truk'  => $request->nama_truk,
            'kapasitas_truk' => $request->kapasitas_truk,
            'plat_nomor' => $request->plat_nomor,
        ]);
        return redirect("truk")->with("message", "Data berhasil disimpan");
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
    public function edit(Truk $truk)
    {
        $data['truk'] = Truk::all();
        return view('truk/edit-truk', compact('truk'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Truk $truk)
    {
        $request->validate([
            'nama_truk' => 'required',
            'kapasitas_truk' => 'required',
            'plat_nomor' => 'required',
        ]);

        $truk->update([
            'id_truk' => rand(),
            'nama_truk'  => $request->nama_truk,
            'kapasitas_truk' => $request->kapasitas_truk,
            'plat_nomor' => $request->plat_nomor,
        ]);
        return redirect("truk")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truk $truk)
    {
        $truk->delete();
        return redirect("truk")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $truk = Truk::get();
        $pdf = Pdf::loadview('truk\laporan-truk', ['truk' => $truk])->setPaper('a4');
        return $pdf->download('laporan-truk.pdf');
    }
}
