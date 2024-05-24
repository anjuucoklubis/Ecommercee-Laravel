<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryProductController extends Controller
{
    public function getViewCategoryProduct()
    {
        //$category_products = DB::table('category_products')->simplePaginate(5);
        //  $catproductt = CategoryProduct::with('categoryproduct')->simplePaginate(5);
        return view('modules.back.categoryproduct.main', [
            //'title'=>'Online Shop',
            // 'active' => 'login'
            //'catproduct' => CategoryProduct::all(),
            "catproduct" => CategoryProduct::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
            // compact('catproductt')


        ]);
    }

    public function createCategoryProduct()
    {
        return view('modules.back.categoryproduct.create', [
            'active' => 'mengelolabarang',
            'title' => 'Tambah Category Product',
            'catproduct' => CategoryProduct::all(),
        ]);
    }
    public function saveCreateCategoryProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $file = $request->file('image');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'images/categoryproducts';
        $file->move($tujuanFile, $namaFile);

        $catproduct = new CategoryProduct();
        $catproduct->name = $request->name;
        $catproduct->image = $namaFile;
        $catproduct->save();
        Alert::success('Berhasil', 'Kategori telah ditambahkan!');
        return redirect('/dashboard/categoryproduct');
    }

    public function updateCategoryProduct(Request $request, $id)
    {
        $kategori = CategoryProduct::findorfail($id);
        return view('modules.back.categoryproduct.update', compact('kategori'), [
            'title' => 'Ubah Kategori',
            'active' => 'mengelolacategory',
        ]);
    }

    public function saveUpdateCategoryProduct(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $kategori = CategoryProduct::find($id);
        $kategori->name = $request->input('name');

        // Proses gambar baru
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'images/categoryproducts';
            $file->move($tujuanFile, $namaFile);

            // Hapus gambar lama jika ada
            if (file_exists(public_path($tujuanFile . '/' . $kategori->image))) {
                unlink(public_path($tujuanFile . '/' . $kategori->image));
                $kategori->image = $namaFile;

            }else{
                $kategori->save();

            }

        }

        $kategori->save();
        Alert::success('Berhasil', 'Kategori telah diubah!');
        return redirect('/dashboard/categoryproduct');
    }


    public function deleteCategoryProduct($id)
    {
        $data = CategoryProduct::find($id);
        if ($data->image) {
            $imagePath = public_path('images/categoryproducts/' . $data->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect('/dashboard/categoryproduct');
    }
}
