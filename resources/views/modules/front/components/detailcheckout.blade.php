<section class="main-content">
    <div class="container">
        <div class="row">
            <section class="col-lg-12 col-md-12 shopping-cart">
                <div class="card mb-4 bg-light border-0 section-header">
                    <div class="card-body p-5">
                        <h2 class="mb-0">Checkout Cart</h2>
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



                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                        <span class="fw-bold">{{ $cart_item->subtotal }}</span> IDR
                                    </div>
                                </div>
                            </li>

                        </ul>
                        @endforeach


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
