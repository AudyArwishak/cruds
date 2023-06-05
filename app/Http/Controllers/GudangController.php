<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Gula;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $gudang = Gudang::join('tb_gula', 'tb_gula.id_gula', 'tb_gudang.id_gula')
            ->select('tb_gudang.*', 'tb_gula.*')
            ->paginate(10);
        // return view('gudang.gudang', compact('gudang'))->with('i', (request()->input('page', 1) - 1) * 5);
        // $gudang = $request->gula();
        return view('gudang.gudang', compact('gudang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gula = Gula::all();
        // $gudang = Gudang::all();
        return view('gudang.tambah-gudang', compact('gula'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'alamat_gudang' => 'required',
            'id_gula' => 'required',
        ]);

        Gudang::create([
            'id_gudang' => rand(),
            'nama_gudang' => $request->nama_gudang,
            'alamat_gudang' => $request->alamat_gudang,
            'id_gula' => $request->id_gula,
        ]);
        return redirect("gudang")->with("message", "Data berhasil disimpan");
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
        $gudang = Gudang::join('tb_gula', 'tb_gula.id_gula', 'tb_gudang.id_gula')
            ->select('tb_gudang.*', 'tb_gula.*');
        // $data['gula'] = Gula::all();
        $gudang = Gudang::find($id);

        $gula = Gula::all();
        return view('gudang.edit-gudang', compact('gudang', 'gula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'alamat_gudang' => 'required',
            'id_gula' => 'required',
        ]);


        // $gudang = Gudang::join('tb_gula', 'tb_gula.id_gula', 'tb_gudang.id_gula')
        //     ->select('tb_gudang.*', 'tb_gula.*');
        $gudang = Gudang::find($id);


        $gudang->update([
            'id_gudang' => rand(),
            'nama_gudang' => $request->nama_gudang,
            'alamat_gudang' => $request->alamat_gudang,
            'id_gula' => $request->id_gula,
        ]);
        return redirect("gudang")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gudang = Gudang::find($id);
        $gudang->delete();
        return redirect("gudang")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $gudang = Gudang::join('tb_gula', 'tb_gula.id_gula', 'tb_gudang.id_gula')
            ->select('tb_gudang.*', 'tb_gula.*')->get();
        $pdf = Pdf::loadview('gudang\laporan-gudang', ['gudang' => $gudang])->setPaper('a4');
        return $pdf->download('laporan-gudang.pdf');
    }
}
