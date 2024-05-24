<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Botong Shop') }}
        </h2>
    </x-slot>
    <div id="loading" class="spinner-border text-primary" role="status" style="display: none;">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <div class="d-flex">

            <div class="w-100">
                <div class="row">
                    @if (auth()->user()->role_id == 1)
                    <div class="col-sm-3">
                        <a href="{{ url('/dashboard/manageuser') }}" class="text-decoration-none ">
                            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">User</div>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Total</strong> User</h5>
                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="truck"></i>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3 text-center">{{ $user->count() }}</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ url('/dashboard/managerole') }}" class="text-decoration-none">
                            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Role</div>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Total</strong> Role</h5>
                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="truck"></i>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3 text-center">{{ $role->count() }}</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ url('/dashboard/product') }}" class="text-decoration-none ">
                            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Produk </div>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Total</strong> Produk</h5>
                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="truck"></i>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3 text-center">{{ $product->count() }}</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if (auth()->user()->role_id == 2)
                    <div class="col-sm-3">
                        <a href="{{ url('/dashboard/product') }}" class="text-decoration-none ">
                            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Produk Saya</div>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Total</strong> Produk</h5>
                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="truck"></i>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3 text-center">{{ auth()->user()->products->count() }}</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                    <div class="col-sm-3">
                        <a href="{{ url('/dashboard/categoryproduct') }}" class="text-decoration-none ">
                            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Kategori Produk</div>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Total</strong> Kategori</h5>
                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="truck"></i>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3 text-center">{{ $catproduct->count() }}</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>