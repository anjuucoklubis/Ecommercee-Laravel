<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\City;
use App\Models\Province;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException; // Import the correct exception class
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // Import Log facade

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        if ($user) {
            $userCityId = $user->city_id;
            $destination = $userCityId;
        } else {
            // Jika user tidak ditemukan, atur destination ke nilai default
            $destination = ''; // Atur ke nilai default sesuai kebutuhan Anda
        }

        // Ambil city_id dari seller sebagai origin
        $cartItems = CartItem::whereHas('product.user', function ($query) {
            $query->whereNotNull('city_id'); // Pastikan seller memiliki city_id yang terdefinisi
        })->first(); // Ambil satu item dari keranjang (Anda dapat menyesuaikan sesuai kebutuhan)

        if ($cartItems) {
            $sellerCityId = $cartItems->product->user->city_id;
            $origin = $sellerCityId;
        } else {
            // Jika tidak ada item dalam keranjang atau seller tidak memiliki city_id, atur origin ke nilai default
            $origin = ''; // Atur ke nilai default sesuai kebutuhan Anda
        }

        $cart = Cart::where('user_id', $userId)->first();
        if ($cart) {
            $weight = $cart->grand_total_weight;
        } else {
            // Jika cart tidak ditemukan, atur weight ke nilai default
            $weight = ''; // Atur ke nilai default sesuai kebutuhan Anda
        }

        if ($request->courier) {
            $courier =  $request->courier;

            try {
                $response = Http::withOptions([
                    'verify' => false, // Nonaktifkan verifikasi SSL
                    'timeout' => 30, // Atur timeout menjadi 30 detik
                ])->asForm()->withHeaders([
                    'key' => 'cbcb8b2cf1a94f656a902e26d7b8967c',
                ])->post('https://api.rajaongkir.com/starter/cost', [
                    'origin' => $origin,
                    'destination' => $destination,
                    'weight' => $weight,
                    'courier' => $courier
                ]);

                // Mendapatkan tubuh (body) respon dalam bentuk string
                $data = $response->getBody()->getContents();

                // Mengubah JSON string menjadi array asosiatif
                $dataArray = json_decode($data, true);

                // Mendapatkan hasil (results) dari respon
                $results = $dataArray['rajaongkir']['results'][0]['costs'];
                // dd($results);

                // Mengembalikan data hasil sebagai respon
                //return $results;
            } catch (RequestException $e) {
                // Menangani exception jika permintaan gagal
                // Anda dapat menambahkan log atau melakukan penanganan lainnya
                return "Error: " . $e->getMessage();
            }
        } else {
            $courier = '';
            $results = null;
        }


        $province = Province::all();

        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->first();
        $user = $cart->user;
        $userName = $user->name;
        $userCity = $cart->user->city->city_name;
        $userPostalcode = $cart->user->city->postal_code;

        $cart =  Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $cart_item = CartItem::where('cart_id', $cart->id)->get();

        return view('modules.front.layouts.appcheckout', compact('province', 'results', 'userName', 'userCity', 'userPostalcode', 'cart_item'));
    }

    public function ajax($id)
    {
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');

        return json_encode($cities);
    }

  
    public function create_transaction(Request $request)
    {
        try {
            // Pastikan pengguna memiliki keranjang belanja terkait
            if (Auth::user()->cart) {
                $validatedData = $request->validate([
                    'delivery_service' => 'required',
                ]);
                $transaction = new Transaction;
                $transaction->delivery_service = $request->delivery_service;
                $transaction->cartId = Auth::user()->cart->id;

                // Tampilkan nilai cart_id dan delivery_service
                dd([
                    'cart_id' => $transaction->cartId,
                    'delivery_service' => $transaction->delivery_service
                ]);

                // Kembalikan redirect setelah dd() jika Anda ingin melanjutkan proses setelahnya
                // return redirect()->back()->with('success', 'Transaksi berhasil disimpan.');
            } else {
                return redirect()->back()->with('error', 'Pengguna tidak memiliki keranjang belanja terkait.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan transaksi. Silakan coba lagi.');
        }
    }
}
