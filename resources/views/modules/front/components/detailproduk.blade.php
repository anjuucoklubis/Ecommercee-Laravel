<div class="card border-success">
    <div class="card-header bg-info text-white" style="font-size: 23px;">
        <strong><i class="fa fa-database"></i>"{{ $GetProductbyid->name }}"</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="slide" data-thumb="{{asset('images/products/'.$GetProductbyid->image)}}"><a href="{{asset('images/products/'.$GetProductbyid->image)}}" title="Preview Dress - Front View" data-lightbox="gallery-item"><img src="{{asset('images/products/'.$GetProductbyid->image)}}" alt="{{$GetProductbyid->image}}" class="img-fluid img-thumbnail" style="width: 500px; height:400px;"></a></div>
            </div>
            <div class="col-8">
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table cart">

                        <div style="display: flex; flex-direction: column;">
                            <h2 class="fa fa-database" style="font-weight: bold; font-size: 30px;">{{ $GetProductbyid->name }}</h2 </div>
                            <div style="display: flex; flex-direction: row;" class="gap-20 mb-3">
                                <h2 class="fa fa-database" style="font-weight: bold; font-size: 15px;">3,1RB Penilaian</h2>
                                <h2 class="fa fa-database" style="font-weight: bold; font-size: 15px;">10RB+ Terjual</h2>
                            </div>
                        </div>
                        <div class="flex flex-column" style="background-color: #f3f4f6;">
                            <div class="flex items-center">
                                <h2 class="flex items-center" style="font-weight: bold; font-size: 50px; color: orangered; ; padding: 8px;">IDR {{$GetProductbyid->price}}</h2>
                            </div>
                        </div>
                        <div class="flex flex-column">
                            <div style="display: flex; flex-direction: row;" class="gap-35">
                                <h2 class="flex items-center" style="font-weight: bold; font-size: 20px;  ; padding: 8px;">Stok </h2>
                                <h2 class="flex items-center" style="font-weight: bold; font-size: 20px;  ; padding: 8px;"> {{$GetProductbyid->stock}}</h2>
                            </div>
                        </div>

                        <form method="POST" action="{{ url('carts') }}/{{ $GetProductbyid->id }}">
                            @csrf
                            <tr class="cart_item">
                                <th><strong>Kuantitas</strong></th>
                                <td>
                                    <div class="quantity-counter">
                                        <button onclick="decreaseQuantity()">-</button>
                                        <input type="text" id="qty_req" name="qty_req" required value="{{ $qty_req }}"> <button onclick="increaseQuantity()">+</button>
                                    </div>
                                </td>
                            </tr>
                    </table>
                </div>
                <div class="footer">
                    <button type="submit" class="btn btn-danger float-right my-3 mx-3" onclick="return validateForm();" data-dismiss="modal">Masukkan Keranjang</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function increaseQuantity() {
        var quantityInput = document.getElementById('qty_req');
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('qty_req');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 0) {
            quantityInput.value = currentValue - 1;
        }
    }

    function validateForm() {
        var quantityInput = document.getElementById('qty_req');
        var currentValue = parseInt(quantityInput.value);
        var stock = parseInt("{{$GetProductbyid->stock}}"); // Ambil stok dari PHP

        if (currentValue <= 0) {
            Swal.fire({
                title: "Harap masukkan kuantitas yang valid.",
                text: "minimal 1",
                icon: "warning"
            });
            return false;
        } else if (currentValue > stock) {
            Swal.fire({
                title: "Kuantitas melebihi stok yang tersedia.",
                text: "Stok yang tersedia: " + stock,
                icon: "warning"
            });
            return false;
        }
        return true;
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Tangkap formulir
        var form = document.querySelector('form');

        // Tambahkan event listener untuk event submit formulir
        form.addEventListener('submit', function() {
            // Setelah formulir dikirim, atur nilai input kuantitas menjadi 0
            var quantityInput = document.getElementById('qty_req');
            quantityInput.value = 0;
        });
    });
</script>