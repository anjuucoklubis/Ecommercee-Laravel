<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kateogri Produk') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard/categoryproduct">Manage Kateogri Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah  Kateogri Produk </li>
            </ol>
        </nav>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1">Kategori</span>
                <input type="text" require name="name" class="form-control" placeholder="isi kategori ..." aria-label="kategori" aria-describedby="basic-addon1">
            </div>
            <div class="form-group mb-2">
                <div class="form-group col-md-12">
                    <img class="img-preview img-fluid mt-2 col-sm-5"><br>
                    <span class="input-group-text">Unggah Gambar Kategori Produk</span>

                    <input type="file" value="{{ old('image') }}" class=" form-control" name="image" id="image" placeholder="Image URL" value="{{ old('image') }}" onchange="previewImage()">
                </div>
            </div>
            <hr>
            <a href="/dashboard/categoryproduct" class="btn btn-danger"><span data-feather="">Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Tambah</button>
        </form>
    </div>

</x-app-layout>