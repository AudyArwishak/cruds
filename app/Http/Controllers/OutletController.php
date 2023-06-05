<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlet = Outlet::paginate(10);
        return view('outlet/outlet', compact('outlet'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outlet/tambah-outlet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_outlet' => 'required',
            'nama_outlet' => 'required',
            'alamat_outlet' => 'required',
            'notelp' => 'required',
        ]);

        Outlet::create([
            'id_outlet' => rand(),
            'nama_outlet'  => $request->nama_outlet,
            'alamat_outlet' => $request->alamat_outlet,
            'notelp' => $request->notelp,
        ]);
        return redirect("outlet")->with("message", "Data berhasil disimpan");
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
    public function edit(Outlet $outlet)
    {
        $data['outlet'] = Outlet::all();
        return view('outlet/edit-outlet', compact('outlet'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        $request->validate([
            'nama_outlet' => 'required',
            'nama_outlet' => 'required',
            'alamat_outlet' => 'required',
            'notelp' => 'required',
        ]);

        $outlet->update([
            'id_outlet' => rand(),
            'nama_outlet'  => $request->nama_outlet,
            'alamat_outlet' => $request->alamat_outlet,
            'notelp' => $request->notelp,
        ]);
        return redirect("outlet")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect("outlet")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $outlet = Outlet::get();
        $pdf = Pdf::loadview('outlet\laporan-outlet', ['outlet' => $outlet])->setPaper('a4');
        return $pdf->download('laporan-outlet.pdf');
    }
}
