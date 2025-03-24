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
        $total_harga = $obat->harga * $request->jumlah;

        Cart::create([
            'user_id' => Auth::id(),
            'obat_id' => $request->obat_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('cart.index')->with('success', 'Obat berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->jumlah = $request->jumlah;
        $cart->total_harga = $cart->obat->harga * $request->jumlah;
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui.');
    }

    // Menghapus item dari keranjang
    public function destroy($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Obat berhasil dihapus dari keranjang.');
    }

}
