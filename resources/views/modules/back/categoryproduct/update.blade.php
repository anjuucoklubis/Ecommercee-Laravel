<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Kateogri Produk') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard/categoryproduct">Manage Kateogri Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Kateogri Produk </li>
            </ol>
        </nav>
        <h1 class="h3 mb-3"><strong>Ubah Kategori Produk</strong></h1>
        <form action="{{ url('dashboard/categoryproduct/update',$kategori->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1">Kategori</span>
                <input type="text" name="name" class="form-control" placeholder="isi kategori ..." aria-label="kategori" aria-describedby="basic-addon1" required value="{{ $kategori->name }}">
            </div>
            <div class="form-group mb-3">
                <div class="form-group col-md-12">
                    <br>
                    <span class="input-group-text">Unggah Gambar Kategori Produk</span>
                    <input type="file" class="form-control" name="image" id="image" accept="image/jpeg, image/png, image/jpg" onchange="previewImage()">
                    @if ($kategori->image)
                    <img class="img-preview img-fluid mt-2 col-sm-3" src="{{ asset('images/categoryproducts/' . $kategori->image) }}" alt="Product Image Preview">
                    @else
                    <img class="img-preview img-fluid mt-2 col-sm-3" src="{{ asset('path/to/placeholder/image.jpg') }}" alt="Product Image Preview">
                    @endif
                </div>
            </div>
            <hr>
            <a href="/dashboard/categoryproduct" class="btn btn-danger"><span data-feather="">Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Ubah</button>
        </form>
    </div>
</x-app-layout>