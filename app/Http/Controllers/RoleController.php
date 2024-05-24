<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    function index()
    {
        return view('modules.back.managerole.main', [
            'role' => Role::all(),
            "role" => Role::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
        ]);
    }

    function createRole()
    {
        return view('modules.back.managerole.create', [
            'active' => 'mengelolabarang',
            'title' => 'Tambah Barang',
        ]);
    }

    function saveRole(Request $request)
    {
        $validatedData = $request->validate([
            'roleName' => 'required',
            'roleId' => 'required',
        ]);
        $role = new Role;
        $role->roleId = $request->roleId;
        $role->roleName = $request->roleName;
        $role->save();
        Alert::success('Berhasil','Role telah ditambahkan!');
        return redirect('/dashboard/managerole');
        
    }

    function updateRole(Request $request, $id)
    {
        $role = Role::findorfail($id);
        return view('modules.back.managerole.update', compact('role'), [
            'active' => 'mengelolabarang',
            'title' => 'Tambah Barang',
        ]);
    }


    function saveUpdateRole(Request $request, $id)
    {
        $validatedData = $request->validate([
            'roleName' => 'required',
            'roleId' => 'required',
        ]);
        $role = Role::find($id);
        $role->roleName = $request->input('roleName');
        $role->roleId = $request->input('roleId');
        $role->save();
        Alert::success('Berhasil','Role telah diubah!');
        return redirect('/dashboard/managerole');
    }
    
    public function deleteRoleByAdmin($id)
    {
        $data = Role::find($id);
        $data->delete();
        return redirect('/dashboard/managerole');
    }
}
