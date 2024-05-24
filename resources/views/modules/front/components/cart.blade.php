<section class="main-content">
    <div class="container">
        <div class="row">
            <section class="col-lg-12 col-md-12 shopping-cart">
                <div class="card mb-4 bg-light border-0 section-header">
                    <div class="card-body p-5">
                        <h2 class="mb-0">Shopping Cart</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <?php $no = 1; ?>
                        @foreach($cart_item as $cart_item)
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item py-3 border-top">
                                <div class="row align-items-center">
                                    <div class="col-6 col-md-6 col-lg-7">
                                        <div class="d-flex">
                                            <img src="{{ asset('images/products/'.$cart_item->product->image) }}" alt="Product Image" style="height: 70px;">

                                            <div class="ms-3">
                                                <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                                    <span class="fw-bold">{{ $cart_item->product->name}}</span>
                                                </div>
                                                <a href="">
                                                    <h6 class="mb-0"></h6>
                                                </a>
                                                <span>
                                                    <small>{{ $cart_item->product->price}}</small>
                                                    <small class="text-muted text-decoration-line-through"></small>
                                                    <small>IDR </small>
                                                </span>

                                                <div class="mt-2 small lh-1">
                                                    <a href="#" class="text-decoration-none text-inherit" onclick="event.preventDefault(); deleteCartItem('{{ $cart_item->id }}')">
                                                        <span class="me-1 align-text-bottom">
                                                            <i class='bx bx-trash'></i>
                                                        </span>
                                                        <span class="text-muted">Hapus</span>
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3 col-md-2 col-lg-2">
                                        <form id="updateQtyForm_{{ $cart_item->id }}" action="{{ url('carts/update', $cart_item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="qty" value="{{ $cart_item->qty }}" id="qty_{{ $cart_item->id }}" class="form-control" min="1" onchange="updateQty('{{ $cart_item->id }}')">
                                        </form>
                                    </div>


                                    <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                        <span class="fw-bold">{{ $cart_item->subtotal }}</span> IDR
                                    </div>
                                </div>
                            </li>

                        </ul>
                        @endforeach
                        <div class="d-flex justify-content-between mt-4">
                            <a href="/" class="bg-gray-500 text-white font-bold py-2 px-4 rounded-full transition-colors duration-300 hover:bg-red-700 hover:text-white focus:bg-red-700 focus:text-white">
                                Lanjutkan belanja
                            </a>
                        </div>

                    </div>
                    <div class="col-12 col-lg-4 col-md-5" style="top: 20px;">
                        <?php

                        use Illuminate\Support\Facades\Auth;
                        use App\Models\Cart;

                        $pesanan_utama = \App\Models\Cart::where('user_id', Auth::user()->id)->where('status', 0)->first();
                        $item_subtotal = \App\Models\CartItem::where('cart_id', $pesanan_utama->id)->count();
                        $grand_total = $pesanan_utama->grand_total;
                        $grand_total_weight = $pesanan_utama->grand_total_weight;
                        ?>
                        <div class="mb-4 card mt-6">
                            <div class="card-body p-6">
                                <!-- heading -->
                                <h2 class="h5 mb-4">Summary</h2>
                                <div class="card mb-2">
                                    <!-- list group -->
                                    <ul class="list-group list-group-flush">
                                        <!-- list group item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div>Item Subtotal</div>
                                            </div>
                                            <span>{{ $item_subtotal}}</span>
                                        </li>
                                        <!-- list group item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div>Subtotal Berat</div>
                                            </div>
                                            <span>{{$grand_total_weight}} gram</span>
                                        </li>
                                        <!-- list group item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold">Subtotal Harga</div>
                                            </div>
                                            <span class="fw-bold">{{ $grand_total }} IDR </span> 
                                        </li>
                                        <!-- list group item -->
                                        <!-- <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div>Tax</div>
                                            </div>
                                            <span></span>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="d-grid mb-1 mt-4">
                                    <!-- btn -->
                                    <a href="/checkout" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">

                                        Lanjutkan Pembayaran
                                        <span class="fw-bold"></span>
                                    </a>
                                </div>
                                <!-- text -->
                                <p>
                                    <small>
                                        Subtotal Harga belum termasuk tarif ongkos kirim.  
                                        <!-- <a href="#!">Lanjutkan pembayaran</a>  -->
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<script>
    function deleteCartItem(cartItemId) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus item ini?',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan DELETE dengan AJAX
                fetch('/cartItemdelete/' + cartItemId, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Ada masalah saat menghapus item');
                        }
                        // Refresh halaman setelah penghapusan berhasil
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: error.message,
                            icon: 'error'
                        });
                    });
            }
        });
    }
</script>

<script>
    function updateQty(cartItemId) {
        var formId = 'updateQtyForm_' + cartItemId;
        var qty = document.getElementById('qty_' + cartItemId).value;
        document.getElementById(formId).submit();
    }
</script>