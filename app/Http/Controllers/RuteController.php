<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Rute;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = Rute::paginate(10);
        return view('rute/rute', compact('rute'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rute/tambah-rute');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rute' => 'required',
            'jarak_rute' => 'required',
        ]);

        Rute::create([
            'id_rute' => rand(),
            'nama_rute'  => $request->nama_rute,
            'jarak_rute' => $request->jarak_rute,
        ]);
        return redirect("rute")->with("message", "Data berhasil disimpan");
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
    public function edit(Rute $rute)
    {
        $data['rute'] = Rute::all();
        return view('rute/edit-rute', compact('rute'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rute $rute)
    {
        $request->validate([
            'nama_rute' => 'required',
            'jarak_rute' => 'required',
        ]);

        $rute->update([
            'id_rute' => rand(),
            'nama_rute' => $request->nama_rute,
            'jarak_rute'  => $request->jarak_rute,
        ]);
        return redirect("rute")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rute $rute)
    {
        $rute->delete();
        return redirect("rute")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $rute = Rute::get();
        $pdf = Pdf::loadview('rute\laporan-rute', ['rute' => $rute])->setPaper('a4');
        return $pdf->download('laporan-rute.pdf');
    }
}
