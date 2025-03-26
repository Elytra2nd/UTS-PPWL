<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->with('obat')->get();
        $obats = Obat::all();
        return view('cart.index', compact('carts', 'obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $obat = Obat::findOrFail($request->obat_id);

        if ($obat->stok < $request->jumlah) {
            return redirect()->route('cart.index')->with('error', 'Stok tidak mencukupi.');
        }

        $total_harga = $obat->harga * $request->jumlah;
        $obat->decrement('stok', $request->jumlah);

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
        $obat = $cart->obat;

        $selisih = $request->jumlah - $cart->jumlah;

        if ($selisih > 0 && $obat->stok < $selisih) {
            return redirect()->route('cart.index')->with('error', 'Stok tidak mencukupi untuk perubahan jumlah.');
        }

        $obat->decrement('stok', max($selisih, 0));
        $obat->increment('stok', max(-$selisih, 0));

        $cart->jumlah = $request->jumlah;
        $cart->total_harga = $cart->obat->harga * $request->jumlah;
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $obat = $cart->obat;

        $obat->increment('stok', $cart->jumlah);

        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Obat berhasil dihapus dari keranjang.');
    }

    public function checkout($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);

        // Hapus item yang dicheckout dari keranjang
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Checkout berhasil! Obat telah diproses.');
    }

    public function destroyAll()
    {
        Cart::truncate(); // Hapus semua data di tabel carts
        return redirect()->back()->with('success', 'Semua obat berhasil dihapus dari keranjang.');
    }


}
