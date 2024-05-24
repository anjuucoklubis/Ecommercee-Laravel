<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Role') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/dashboard/managerole" style="text-decoration: none">Manage Role</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Role</li>
            </ol>
        </nav>
        <form action="{{ url('dashboard/managerole/update',$role->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1">Nama Role</span>
                <input type="text" name="roleName" class="form-control" placeholder="isi Nama Role ..." aria-label="roleName" aria-describedby="basic-addon1" required value="{{ $role->roleName }}">
            </div>
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1">Role ID</span>
                <input type="text" name="roleId" class="form-control" placeholder="isi ID Role ..." aria-label="roleId" aria-describedby="basic-addon1" required value="{{ $role->roleId }}">
            </div>
            <hr>
            <a href="/dashboard/managerole" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle updateRole"></i> Ubah</button>
        </form>
    </div>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
</x-app-layout>