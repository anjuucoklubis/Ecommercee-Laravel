<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
 <div class="d-flex">
        <div class="w-100">
            <div class="row">

                <div class="col-sm-3">
                    <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Produk</div>
                        <div class="card-body">
                            <h5 class="card-title"><strong>Total</strong> Vendor</h5>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="truck"></i>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-center">{{ $product->count() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
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
                </div>


            </div>
        </div>
    </div>                </div>
            </div>
        </div>
    </div>
</x-app-layout>
