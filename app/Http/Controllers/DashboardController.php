<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Obat;


class DashboardController extends Controller
{
    public function index()
    {
        $totalStok = Obat::sum('stok');
        $obats = Obat::latest()->take(5)->get();
        return view('dashboard', compact('totalStok', 'obats'));
    }
}
