<?php

namespace App\Http\Controllers;

use App\Models\Gula;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gula = Gula::paginate(10);
        return view('gula/gula', compact('gula'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gula/tambah-gula');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_gula' => 'required',
            'stok_gula' => 'required',
        ]);

        Gula::create([
            'id_gula' => rand(),
            'nama_gula'  => $request->nama_gula,
            'stok_gula' => $request->stok_gula,
        ]);
        return redirect("gula")->with("message", "Data berhasil disimpan");
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
    public function edit(Gula  $gula)
    {
        $data['gula'] = Gula::all();
        return view('gula/edit-gula', compact('gula'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gula $gula)
    {
        $request->validate([
            'nama_gula' => 'required',
            'stok_gula' => 'required',
        ]);

        $gula->update([
            'id_gula' => rand(),
            'nama_gula'  => $request->nama_gula,
            'stok_gula' => $request->stok_gula,
        ]);
        return redirect("gula")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gula $gula)
    {
        $gula->delete();
        return redirect("gula")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $gula = Gula::get();
        $pdf = Pdf::loadview('gula\laporan-gula', ['gula' => $gula])->setPaper('a4');
        return $pdf->download('laporan-gula.pdf');
    }
}
