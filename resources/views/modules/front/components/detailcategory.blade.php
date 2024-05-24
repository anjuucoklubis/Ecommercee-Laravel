<div class="grid gap-6 lg:gap-8">
    <div class="p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 dark:shadow-none">
        <div>
            <div class="flex items-center gap-4" style="display: flex;">
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $category->name }}</h2>
            </div>
            <br>
            @if($products->isEmpty())
            <p>Tidak ada produk tersedia dalam kategori ini.</p>
            @else
            <div id="produk-container" class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-0 lg:gap-8 produk-container">
                @foreach ($products as $product)
                <div class="relative bg-white rounded-lg border border-gray-300 shadow-md overflow-hidden flex motion-safe:hover:scale-[1.04] text-decoration-none">
                    <div id="" class="p-4 produk-container">
                        <div class="h-30 w-30 bg-red-50 dark:bg-red-800/20 flex items-center justify-center ">
                            <!-- Ganti URL gambar sesuai dengan gambar kategori -->
                        </div>
                        <div class="flex items-center gap-4">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-white" style="font-size:medium">{{ $product->name }}</h5>
                        </div>
                        <div class="flex items-center gap-4">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-white" style="font-size:small;">Rp {{ $product->price }}.000</h5>
                        </div>
                        @auth
                        <a href="{{ url('detail',$product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> Buy Now</a>

                        @else
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> Buy Now</a>
                        @endauth
                    </div>
                    <div class="absolute inset-0 border-2 border-gray-300 pointer-events-none"></div>
                </div>
                @endforeach
            </div>
            @endif
            <br>
        </div>
    </div>
</div>