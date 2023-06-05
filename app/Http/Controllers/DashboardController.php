<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Outlet;
use App\Models\Supir;
use App\Models\Truk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['supir'] = Supir::count();
        $data['truk'] = Truk::count();
        $data['gudang'] = Gudang::count();
        $data['outlet'] = Outlet::count();

        return view('dashboard', $data);
    }
}
