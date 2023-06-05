<?php

namespace App\Http\Controllers;

use App\Models\Supir;
use App\Models\Truk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $supir = Supir::join('tb_truk', 'tb_truk.id_truk', 'tb_supir.id_truk')
            ->select('tb_supir.*', 'tb_truk.*')
            ->paginate(10);
        return view('supir.supir', compact('supir'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $truk = Truk::all();
        return view('supir.tambah-supir', compact('truk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_supir' => 'required',
            'alamat_supir' => 'required',
            'notelp' => 'required',
            'id_truk' => 'required',
        ]);

        Supir::create([
            'id_supir' => rand(),
            'nama_supir'  => $request->nama_supir,
            'alamat_supir' => $request->alamat_supir,
            'notelp' => $request->notelp,
            'id_truk' => $request->id_truk,
        ]);
        return redirect("supir")->with("message", "Data berhasil disimpan");
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
        $supir = Supir::join('tb_truk', 'tb_truk.id_truk', 'tb_supir.id_truk')
            ->select('tb_supir.*', 'tb_truk.*');
        $supir = Supir::find($id);

        $truk = Truk::all();
        return view('supir.edit-supir', compact('supir', 'truk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supir' => 'required',
            'alamat_supir' => 'required',
            'notelp' => 'required',
        ]);

        $supir = Supir::find($id);

        $supir->update([
            'nama_supir' => $request->nama_supir,
            'alamat_supir' => $request->alamat_supir,
            'alamat_supir' => $request->alamat_supir,
            'id_truk' => $request->id_truk,
        ]);
        return redirect("supir")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supir = Supir::find($id);
        $supir->delete();
        return redirect("supir")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $supir = Supir::join('tb_truk', 'tb_truk.id_truk', 'tb_supir.id_truk')
            ->select('tb_supir.*', 'tb_truk.*')->get();
        $pdf = Pdf::loadview('supir\laporan-supir', ['supir' => $supir])->setPaper('a4');
        return $pdf->download('laporan-supir.pdf');
    }
}
