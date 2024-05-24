<x-app-layout>
    @if (auth()->user()->role_id == 1)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Produk') }}
        </h2>
    </x-slot>
    <div id="loading" class="spinner-border text-primary" role="status" style="display: none;">
        <span class="visually-hidden">Loading...</span>
    </div>
    @elseif (auth()->user()->role_id == 2)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk Saya') }}
        </h2>
    </x-slot>
    <div id="loading" class="spinner-border text-primary" role="status" style="display: none;">
        <span class="visually-hidden">Loading...</span>
    </div>
    @endif

    @if (auth()->user()->role_id == 1)
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Produk</li>
            </ol>
        </nav>
        <div class="table-responsive" col-lg-8>
            <div class="row justify-content-center mb-2">
                <div class="col-md-6">
                    <form action="/dashboard/product">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Produk" name="search" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</ th>
                        <th scope="col">View</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangAll as $key => $item)
                    <tr>
                        <td>{{ $barangAll->firstItem() +$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            <a href="" class="badge bg-info" data-toggle="modal" data-target="#edit-{{ $item->id }}">Lihat</a>
                        </td>
                        <td>
                            <a href="{{ url('dashboard/product/update',$item->id) }}" class="badge bg-warning"><span data-feather="edit-3">Ubah</span></a>
                        </td>
                        <td><a href="{{ url ('/dashboard/product/detele',$item->id) }}" class="badge bg-danger border-0 deleteproduk">Hapus</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <!-- <a href="/dashboard/product/create" class="btn btn-primary mb-3">Tambah Barang</a> -->

            @foreach ($barang as $data)
    <div id="edit-{{ $data->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <strong style="font-size: 30px;">Detail Product</strong>
                </div>
                <div class="card border-success">
                    <div class="card-header bg-info text-white" style="font-size: 23px;">
                        <strong><i class="fa fa-database"></i>Produk "{{ $data->name }}"</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="table-responsive">
                                    <table class="table cart">

                                        <tr class="cart_item">
                                            <th><strong>Nama :</strong></th>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Deskripsi</strong></th>
                                            <td>{{ $data->desc }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Harga</strong></th>
                                            <td>{{ $data->price }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Stok</strong></th>
                                            <td>{{ $data->stock }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Berat (Gram)</strong></th>
                                            <td>{{ $data->weight }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Kategori</strong></th>
                                            <td>{{ $data->category->name }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Pemiliki Produk</strong></th>
                                            <td>{{ $data->user?->name }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Ditambahkan pada:</strong></th>
                                            <td>{{ $data->created_at }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Diubah pada:</strong></th>
                                            <td>{{ $data->updated_at }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="slide" data-thumb="{{asset('images/products/'.$data->image)}}"><a href="{{asset('images/products/'.$data->image)}}" title="Preview Dress - Front View" data-lightbox="gallery-item"><img src="{{asset('images/products/'.$data->image)}}" alt="{{$data->image}}" class="img-fluid img-thumbnail"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <button class="btn btn-danger float-right my-3 mx-3" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    {{ $barang->links() }}
        </div>


    </div>

    @elseif (auth()->user()->role_id == 2)
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk Saya</li>
            </ol>
        </nav>
        <div class="table-responsive" col-lg-8>
            <div class="row justify-content-center mb-2">
                <div class="col-md-6">
                    <form action="/dashboard/product">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Produk" name="search" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</ th>
                        <th scope="col">View</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $key => $item)
                    <tr>
                        <td>{{ $barang->firstItem() +$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            <a href="" class="badge bg-info" data-toggle="modal" data-target="#edit-{{ $item->id }}">Lihat</a>
                        </td>
                        <td>
                            <a href="{{ url('dashboard/product/update',$item->id) }}" class="badge bg-warning"><span data-feather="edit-3">Ubah</span></a>
                        </td>
                        <td><a href="{{ url ('/dashboard/product/detele',$item->id) }}" class="badge bg-danger border-0 deleteproduk">Hapus</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <a href="/dashboard/product/create" class="btn btn-primary mb-3">Tambah Barang</a>
            <hr>
        </div>
    </div>
    @endif

    @foreach ($barang as $data)
    <div id="edit-{{ $data->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <strong style="font-size: 30px;">Detail Product</strong>
                </div>
                <div class="card border-success">
                    <div class="card-header bg-info text-white" style="font-size: 23px;">
                        <strong><i class="fa fa-database"></i>Produk "{{ $data->name }}"</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="table-responsive">
                                    <table class="table cart">

                                        <tr class="cart_item">
                                            <th><strong>Nama :</strong></th>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Deskripsi</strong></th>
                                            <td>{{ $data->desc }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Harga</strong></th>
                                            <td>{{ $data->price }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Stok</strong></th>
                                            <td>{{ $data->stock }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Berat (Gram)</strong></th>
                                            <td>{{ $data->weight }} </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Kategori</strong></th>
                                            <td>{{ $data->category->name }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Pemiliki Produk</strong></th>
                                            <td>{{ $data->user?->name }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Ditambahkan pada:</strong></th>
                                            <td>{{ $data->created_at }}</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th><strong>Diubah pada:</strong></th>
                                            <td>{{ $data->updated_at }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="slide" data-thumb="{{asset('images/products/'.$data->image)}}"><a href="{{asset('images/products/'.$data->image)}}" title="Preview Dress - Front View" data-lightbox="gallery-item"><img src="{{asset('images/products/'.$data->image)}}" alt="{{$data->image}}" class="img-fluid img-thumbnail"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <button class="btn btn-danger float-right my-3 mx-3" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    {{ $barang->links() }}
</x-app-layout>