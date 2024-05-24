<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function GetKategoriHomePage()
    {
        $loggedInUserId = Auth::id();
        return view('modules.front.layouts.app', [
            //'title'=>'Online Shop',
            // 'active' => 'login'
            'GetKategoriHomePage' => CategoryProduct::all(),
            // "barangAll" => CategoryProduct::latest()->filter(request(['search']))->paginate(100)->withQueryString(),
            "GetProdukHomePage" => Product::latest()->filter(request(['search']))->paginate(8)->withQueryString(),
            // 'barang' => CategoryProduct::where('user_id', $loggedInUserId)
            //     ->latest()
            //     ->filter(request(['search']))
            //     ->paginate(5)
            //     ->withQueryString(),
        ]);
    }

    public function GetProductbyid($id)
    {
        $GetProductbyid = Product::findorfail($id);
        $qty_req = 0;
        return view('modules.front.layouts.appdetailproduk', compact('GetProductbyid', 'qty_req'), [
            'title' => 'Ubah product',
            'active' => 'mengelolaproduct',
            'catproduct' => CategoryProduct::all(),
        ]);
    }

    public function GetProductbyCategory($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $products = Product::where('category_id', $id)->latest()->paginate(8);
        $qty_req = 0;
        return view('modules.front.layouts.appdetailcategory', compact('category', 'products'));
    }
    
    
}
