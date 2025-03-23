<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));
    }

    public function addToCart($id)
    {
        $obat = Obat::find($id);
        if (!$obat) {
            return redirect()->back()->with('error', 'Obat tidak ditemukan.');
        }

        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'nama' => $obat->nama,
                'harga' => $obat->harga,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Obat ditambahkan ke keranjang.');
    }

}