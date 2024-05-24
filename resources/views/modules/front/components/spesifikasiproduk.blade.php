<style>
    .spec-list {
        list-style-type: none;
        padding: 0;
    }

    .spec-list li {
        margin-bottom: 10px;
    }

    .spec-list li strong {
        display: inline-block;
        width: 150px; /* Sesuaikan lebar sesuai kebutuhan */
    }
</style>

<div class="grid gap-6 lg:gap-8">
    <div class="p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 dark:shadow-none">
        <div>
            <div class="flex items-center gap-4">
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Spesifikasi Produk</h2>
            </div>
            <br>
            <ul class="spec-list">
                <li><strong>Kategori</strong>{{$GetProductbyid->category->name}}</li>
                <li><strong>Stok</strong>{{$GetProductbyid->stock}}</li>
                <li><strong>Negara Asal</strong> Indonesia</li>
                <li><strong>Dikirim Dari</strong> KAB. BANDUNG</li>
            </ul>
        </div>
    </div>
</div>
