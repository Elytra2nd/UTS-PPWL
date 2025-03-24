<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menampilkan semua item dalam keranjang pengguna
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->with('obat')->get();
        $obats = Obat::all(); // Ambil semua data obat
        return view('cart.index', compact('carts', 'obats'));
    }

    // Menambahkan item ke keranjang
    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $obat = Obat::findOrFail($request->obat_id);

        // Cek apakah stok cukup
        if ($obat->stok < $request->jumlah) {
            return redirect()->route('cart.index')->with('error', 'Stok tidak mencukupi.');
        }

        // Hitung total harga
        $total_harga = $obat->harga * $request->jumlah;

        // Kurangi stok obat
        $obat->decrement('stok', $request->jumlah);

        // Simpan ke keranjang
        Cart::create([
            'user_id' => Auth::id(),
            'obat_id' => $request->obat_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        //dd($obat->stok);
        //dd(session()->all());


        return redirect()->route('cart.index')->with('success', 'Obat berhasil ditambahkan ke keranjang.');

        }

}
