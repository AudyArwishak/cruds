<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::paginate(10);
        return view('pegawai/pegawai', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai/tambah-pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pegawai::create([
            'id_pegawai' => rand(),
            'nama_pegawai'  => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
        ]);
        return redirect("pegawai")->with("message", "Data berhasil disimpan");
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
    public function edit(Pegawai $pegawai)
    {
        $data['pegawai'] = Pegawai::all();
        return view('pegawai/edit-pegawai', compact('pegawai'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {

        $pegawai->update([
            'id_pegawai' => rand(),
            'nama_pegawai'  => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
        ]);
        return redirect("pegawai")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect("pegawai")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $pegawai = Pegawai::get();
        $pdf = Pdf::loadview('pegawai\laporan-pegawai', ['pegawai' => $pegawai])->setPaper('a4');
        return $pdf->download('laporan-pegawai.pdf');
    }
}
