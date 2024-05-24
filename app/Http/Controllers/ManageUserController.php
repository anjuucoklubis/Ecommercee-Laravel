<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class ManageUserController extends Controller
{
    function index()
    {
        return view('modules.back.manageuser.main', [
            'user' => User::all(),
            "user" => User::latest()->filter(request(['search']))->paginate(5)->withQueryString(),

        ]);
    }

    function createUser()
    {
        return view('modules.back.manageuser.create');
    }

    public function saveUsercreatebyadmin(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3
        ]);

        Alert::success('Berhasil','User telah ditambahkan!');
        return redirect('/dashboard/manageuser');
    }

    function updateuser(Request $request, $id)
    {
        $userbyid = User::findorfail($id);
        return view('modules.back.manageuser.update', compact('userbyid'), [
            'roles' => Role::all(),

        ]);
    }

    function saveuser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role_id' => 'required',
        ]);
        $userManageByAdmin = User::find($id);
        $userManageByAdmin->role_id = $request->input('role_id');
        $userManageByAdmin->save();
        Alert::success('Berhasil','User telah diubah!');
        return redirect('/dashboard/manageuser');
    }

    function deleteUserByAdmin($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/dashboard/manageuser');
    }
}
