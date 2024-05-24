<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Role') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/dashboard/managerole" style="text-decoration: none">Manage Role</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Role</li>
            </ol>
        </nav>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Role</span>
                <input type="text" require id="roleName" name="roleName" class="form-control" placeholder="Isi Role..." aria-label="Nama Role" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Role ID</span>
                <input type="text" require id="roleId" name="roleId" class="form-control" placeholder="Isi ID Role..." aria-label="ID Role" aria-describedby="basic-addon1">
            </div>
            <a href="/dashboard/managerole" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Tambah</button>
        </form>
    </div>

</x-app-layout>