<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function pesan(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $tanggal = Carbon::now();
    
        // Check if requested quantity exceeds available stock
        if ($request->qty_req > $product->stock) {
            return redirect('detail/' . $id)->with('error', 'Jumlah yang diminta melebihi stok yang tersedia.');
        }
    
        $check_cart = Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (empty($check_cart)) {
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->tanggal = $tanggal;
            $cart->status = 0;
            $cart->grand_total = 0;
            $cart->grand_total_weight = 0; // Inisialisasi grand total weight
            $cart->save();
        }
    
        $new_cart = Cart::where('user_id', Auth::id())->where('status', 0)->first();
        $check_cart_item = CartItem::where('product_id', $product->id)->where('cart_id', $new_cart->id)->first();
        if (empty($check_cart_item)) {
            $cart_item = new CartItem;
            $cart_item->product_id = $product->id;
            $cart_item->cart_id = $new_cart->id;
            $cart_item->qty = $request->qty_req;
            $cart_item->subtotal = $product->price * $request->qty_req;
            $cart_item->subweight = $product->weight * $request->qty_req;
            $cart_item->save();
        } else {
            $cart_item = CartItem::where('product_id', $product->id)->where('cart_id', $new_cart->id)->first();
            $cart_item->qty = $cart_item->qty + $request->qty_req;
            $grand_total_new = $product->price * $request->qty_req;
            $grand_total_weight_new = $product->weight * $request->qty_req;
            $cart_item->subtotal = $cart_item->subtotal + $grand_total_new;
            $cart_item->subweight = $cart_item->subweight + $grand_total_weight_new;
            $cart_item->update();
        }
    
        // Update grand total for the cart
        $total_weight = $product->weight * $request->qty_req;
        $cart =  Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $cart->grand_total =  $cart->grand_total + $product->price * $request->qty_req;
        $cart->grand_total_weight = $cart->grand_total_weight + $product->  weight * $request->qty_req;
        $cart->update();
    
        return redirect('/carts');
    }
    

    public function index()
    {
        $cart =  Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $cart_item = CartItem::where('cart_id', $cart->id)->get();
        $qty_req = 0;
        return view('modules.front.layouts.appcart', compact('cart_item', 'cart', 'qty_req'));
    }

    public function delete($id)
    {
        $cart_item = CartItem::where('id', $id)->first();

        $cart = Cart::where('id', $cart_item->cart_id)->first();
        $cart->grand_total = $cart->grand_total - $cart_item->subtotal;
        $cart->grand_total_weight = $cart->grand_total_weight - $cart_item->subweight;

        $cart->update();

        $cart_item->delete();
    }

    public function updateQty(Request $request, $id)
    {
        $validatedData = $request->validate([
            'qty' => 'required|integer|min:1', // pastikan qty adalah angka bulat positif
        ]);

        $cartItem = CartItem::find($id);

        if (!$cartItem) {
            return redirect('/carts')->with('error', 'Item keranjang tidak ditemukan.');
        }

        $product = Product::find($cartItem->product_id);

        if (!$product) {
            return redirect('/carts')->with('error', 'Produk tidak ditemukan.');
        }

        // Check if the requested quantity exceeds available stock
        if ($request->qty > $product->stock) {
            Alert::success('error', 'Jumlah yang diminta melebihi stok yang tersedia.');
            return redirect('/carts')->with('error', 'Jumlah yang diminta melebihi stok yang tersedia.');
        }

        // Perbarui qty pada cart item
        $cartItem->qty = $request->input('qty');
        $cartItem->subtotal = $product->price * $request->input('qty');
        $cartItem->subweight = $product->weight * $request->input('qty');
        $cartItem->save();

        // Hitung total harga baru untuk keranjang dan simpan
        $cart = Cart::find($cartItem->cart_id);
        $cart->grand_total = $cart->cartItems()->sum('subtotal');
        $cart->grand_total_weight = $cart->cartItems()->sum('subweight');
        $cart->save();

        Alert::success('Berhasil', 'Jumlah produk telah diperbarui!');

        return redirect('/carts');
    }
}
