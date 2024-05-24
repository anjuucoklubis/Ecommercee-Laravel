<div class="grid gap-6 lg:gap-8">

    <div class="p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg  shadow-gray-500/20 dark:shadow-none">
        <div>
            <div class="flex items-center gap-4">
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Alamat Pengiriman</h2>
            </div>
            <br>
            <div style="display: flex;  align-items:center; ">
                <h3 style="margin-right: auto;">{{ $userName }}</h3>
                <h3 style="margin-right: 10px; font-size:x-large;">{{ $userCity }}, ID {{ $userPostalcode }}</h3>
                <button type="button" class="btn btn-warning" disabled>Utama</button>
            </div>

        </div>
    </div>


    <div class="p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg  shadow-gray-500/20 dark:shadow-none">
        <div>
            <div class="flex items-center gap-4">
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Produk Dipesan</h2>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <?php $no = 1; ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Subtotal Produk</th>
                            </tr>
                        </thead>
                        @foreach($cart_item as $cart_item)
                        <tbody>
                            <tr>
                                <td>
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
                                </td>
                                <td>
                                    <div class="col-3 col-md-2 col-lg-2">
                                        <span>
                                            <small>{{ $cart_item->qty }}</small>
                                            <small class="text-muted text-decoration-line-through"></small>
                                            <small>Pcs </small>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                        <span class="fw-bold">{{ $cart_item->subtotal }}</span> IDR
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="col-lg-12 col-md-7">

                        <span class="">Grand Total Harga Produk</span>
                        <span class="fw-bold">{{ $cart_item->cart->grand_total }}</span> IDR
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg  shadow-gray-500/20 dark:shadow-none">
        <div>
            <div class="flex items-center gap-4">
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Opsi Pengiriman</h2>
            </div>
            <br>
            <form id="checkoutForm" action="{{ route('checkoutt') }}" method="get">
                <!-- Isi formulir Anda di sini -->
                <div class="">
                    <span class="input-group-text">Pilih Jasa Pengiriman</span>
                    <div class="col-md-5 mb-0">
                        <br>
                        <select name="courier" id="courier" class="form-control">
                            <option value="" holder>Pilih Kurir</option>
                            <option value="jne" holder>JNE</option>
                            <option value="tiki" holder>TIKI</option>
                            <option value="pos" holder>Pos Indonesia</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="">
                    <div class="col-md-5 mb-0">
                        <button type="submit" class="btn btn-info btn-block">Hitung Ongkir</button>
                    </div>
                </div>
            </form>


            <br>
            @if($results)
            <form action="{{ route('checkout.create') }}" method="post" id="checkoutForm">
                @csrf
                <div class="col-md-5 mb-0">
                    <span class="input-group-text">Pilih Jasa Pengiriman</span>
                    <select class="form-select" name="delivery_service" id="delivery_service">
                        @foreach($results as $result)
                        <option value="{{ $result['service'] }}" data-cost="{{ $result['cost'][0]['value'] }}" data-description="{{ $result['description'] }}" data-etd="{{ $result['cost'][0]['etd'] }}"> {{ $result['service'] }} - {{ $result['description'] }} - Rp.{{ $result['cost'][0]['value'] }} - {{ $result['cost'][0]['etd'] }} Hari</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn-block">Submit Jasa Pengiriman</button>
            </form>
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-bordered table-hovered" width="100%">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Estimasi</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                            <td> {{$result['service'] }}</td>
                            <td> {{$result['description'] }}</td>
                            <td> {{$result['cost'][0]['value'] }}</td>
                            <td> {{$result['cost'][0]['etd'] }}</td>
                            <td> {{$result['cost'][0]['note']}}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
            <div>Silahkan pili Jasa Pengiriman</div>
            @endif

        </div>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="province_from"]').on('change', function() {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getCity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="origin"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="origin"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="origin"]').empty();
            }
        });

        $('select[name="province_to"]').on('change', function() {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getCity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="destination"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="destination"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="destination"]').empty();
            }
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#delivery_service').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var cost = selectedOption.data('cost');
            $('#delivery_cost').val(cost);
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#delivery_service').change(function() {
            var selectedCourier = $(this).val();
            var baseUrl = "{{ route('checkout.create') }}";
            var newUrl = baseUrl + "?courier=" + selectedCourier;
            window.location.href = newUrl;
            return false;
        });
    });
</script>