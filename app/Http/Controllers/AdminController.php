<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::paginate(10);
        return view('admin/admin', compact('admin'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/tambah-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_admin' => 'required',
            'email' => 'required',
            'kata_sandi' => 'required',
            'level_akses' => 'required',
        ]);

        Admin::create([
            'id_admin' => rand(),
            'nama_admin'  => $request->nama_admin,
            'email' => $request->email,
            'kata_sandi' => $request->kata_sandi,
            'level_akses' => $request->level_akses,
        ]);
        return redirect("admin")->with("message", "Data berhasil disimpan");
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
    public function edit(Admin $admin)
    {
        $data['admin'] = Admin::all();
        return view('admin/edit-admin', compact('admin'), $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'nama_admin' => 'required',
            'email' => 'required',
            'kata_sandi' => 'required',
            'level_akses' => 'required',
        ]);

        $admin->update([
            'nama_admin' => $request->nama_admin,
            'email'  => $request->email,
            'kata_sandi' => $request->kata_sandi,
            'level_akses' => $request->level_akses,
        ]);
        return redirect("admin")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect("admin")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $admin = Admin::get();
        $pdf = Pdf::loadview('admin\laporan-admin', ['admin' => $admin])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-admin.pdf');
    }
}
