<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Produk') }}
        </h2>
    </x-slot>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard/product">Manage Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Produk</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <form action="{{ url('dashboard/product/update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nama Produk</span>
                <input type="text" value="{{ $product->name }}" require id="name" name="name" class="form-control" placeholder="Isi Nama Produk..." aria-label="Nama Produk" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Deskripsi Produk</span>
                <textarea class="form-control" require id="desc" name="desc" aria-label="With textarea" placeholder="Isi Deskripsi Produk">{{ $product->desc }}</textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Harga Produk</span>
                <input type="text" value="{{ $product->price }}" require id="price" name="price" class="form-control" placeholder="Isi Harga Produk" aria-label="Username">
                <span class="input-group-text">Stok Produk</span>
                <input type="text" value="{{ $product->stock }}" class="form-control" require id="stock" name="stock" placeholder="Isi Stok Produk" aria-label="Server">
                <span class="input-group-text">Berat (gram)</span>
                <input type="text" value="{{ $product->weight }}" class="form-control" require id="weight" name="weight" placeholder="Isi Stok Produk" aria-label="Server">
            </div>
            <div class="col-md-5 mb-0">
                <label for="category_id" class="col-form-label"><i>*Kategori produk saat ini</i> : <strong>{{ $product->category->name }}</strong></label>
                <span class="input-group-text">Pilih Kategori Produk</span>
                <select class="form-select" name="category_id">
                    @foreach($catproduct as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <div class="form-group col-md-12">
                    <br>
                    <span class="input-group-text">Unggah Gambar Produk</span>
                    <input type="file" class="form-control" name="image" id="image" accept="image/jpeg, image/png, image/jpg" onchange="previewImage()">
                    @if ($product->image)
                    <img class="img-preview img-fluid mt-2 col-sm-3" src="{{ asset('images/products/' . $product->image) }}" alt="Product Image Preview">
                    @else
                    <img class="img-preview img-fluid mt-2 col-sm-3" src="{{ asset('path/to/placeholder/image.jpg') }}" alt="Product Image Preview">
                    @endif
                </div>
            </div>
    </div>
    <hr>
    <a href="/dashboard/product" class="btn btn-danger">Kembali</a>
    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Ubah</button>
    </form>
    </div>
    <script>
        document.getElementById('stock').addEventListener('input', function(event) {
            let value = event.target.value;
            if (!/^\d*$/.test(value)) {
                event.target.value = value.replace(/[^\d]/g, '');
            }
        });
        document.getElementById('price').addEventListener('input', function(event) {
            let value = event.target.value;
            if (!/^\d*$/.test(value)) {
                event.target.value = value.replace(/[^\d]/g, '');
            }
        });
        document.getElementById('price').addEventListener('input', function(event) {
            let value = event.target.value;
            if (!/^\d*$/.test(value)) {
                event.target.value = value.replace(/[^\d]/g, '');
            }
        });
    </script>
</x-app-layout>