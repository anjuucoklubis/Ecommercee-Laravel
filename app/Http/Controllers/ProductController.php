<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function Viewproduct()
    {
        $loggedInUserId = Auth::id();
        return view('modules.back.product.main', [
            //'title'=>'Online Shop',
            // 'active' => 'login'
            'barangAll' => Product::all(),
            "barangAll" => Product::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
            "barang" => Product::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
            'barang' => Product::where('user_id', $loggedInUserId)
                ->latest()
                ->filter(request(['search']))
                ->paginate(5)
                ->withQueryString(),
        ]);
    }

    public function createProduct()
    {
        return view('modules.back.product.create', [
            'active' => 'mengelolabarang',
            'title' => 'Tambah Barang',
            // 'categories' => Category::all(),
            'catproduct' => CategoryProduct::all(),
        ]);
    }
    public function saveProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'category_id' => 'required',
        ]);
        $file = $request->file('image');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'images/products';
        $file->move($tujuanFile, $namaFile);

        $barang = new Product;
        $barang->name = $request->name;
        $barang->desc = $request->desc;
        $barang->price = $request->price;
        $barang->stock = $request->stock;
        $barang->weight = $request->weight;
        $barang->category_id = $request->category_id;
        $barang->user_id = auth()->user()->id;
        $barang->image = $namaFile;
        $barang->save();
        Alert::success('Berhasil','Produk telah ditambahkan!');
        return redirect('/dashboard/product');
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findorfail($id);
        return view('modules.back.product.update', compact('product'), [
            'title' => 'Ubah product',
            'active' => 'mengelolaproduct',
            'catproduct' => CategoryProduct::all(),
        ]);
    }

    public function saveUpdateProduct(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:5000',
            'category_id' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->desc = $request->input('desc');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');

        // Proses gambar baru
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'images/products';
            $file->move($tujuanFile, $namaFile);

            // Hapus gambar lama jika ada
            if (file_exists(public_path($tujuanFile . '/' . $product->image))) {
                unlink(public_path($tujuanFile . '/' . $product->image));
            }

            $product->image = $namaFile;
        }

        $product->save();
        Alert::success('Berhasil','Produk telah diubah!');
        return redirect('/dashboard/product');
    }

    public function deleteProduct($id)
    {
        $data = Product::find($id);
        if ($data->image) {
            $imagePath = public_path('images/products/' . $data->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect('/dashboard/product');
    }
}
