<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah User') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/dashboard/manageuser" style="text-decoration: none">Manage User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah User</li>
            </ol>
        </nav>
        <form action="" method="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h4 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Informasi Pengguna - Read Only') }}

            </h4>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nama</span>
                <input type="text" value="{{ $userbyid->name }}" require class="form-control" placeholder="-" aria-label="Nama Produk" aria-describedby="basic-addon1" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">No Telepon</span>
                <input type="text" value="{{ $userbyid->telp }}" require class="form-control" placeholder="-" aria-label="Nama Produk" aria-describedby="basic-addon1" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Alamat</span>
                <input type="text" value="{{ $userbyid->address }}" require class="form-control" placeholder="-" aria-label="Nama Produk" aria-describedby="basic-addon1" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="text" value="{{ $userbyid->email }}" require class="form-control" placeholder="-" aria-label="Nama Produk" aria-describedby="basic-addon1" disabled>
            </div>

        </form>
        <hr>
        <form action="{{ url('dashboard/manageuser/update',$userbyid->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h4 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Informasi Pengguna - Update Role') }}
            </h4>
            <div class="col-md-5 mb-0">
                <label for="role_id" class="col-form-label"><i>*Role user saat ini</i> : <strong>{{ $userbyid->role->roleName }}</strong></label>
                <span class="input-group-text">Pilih Role</span>
                <select class="form-select" name="role_id">
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $userbyid->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->roleName }}
                    </option>
                    @endforeach
                </select>
            </div>
            <br>
            <a href="/dashboard/manageuser" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Ubah</button>
        </form>
    </div>
    </div>


</x-app-layout>