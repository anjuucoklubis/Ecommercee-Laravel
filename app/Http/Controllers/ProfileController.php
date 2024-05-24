<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\City;
use App\Models\Province;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $cities = City::pluck('id', 'city_name');
        $province = Province::all();
        return view('profile.edit', [
            'user' => $user,
            'cities' => $cities,
        ], compact('province'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());
    
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
    
        // Perbarui city_id jika ada dalam permintaan
        if ($request->filled('city_id')) {
            $user->city_id = $request->input('city_id');
        }
    
        $user->save();
        Alert::success('Berhasil', 'Profile data telah diupdate');
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Berhasil', 'Akun telah dihapus');
        return Redirect::to('/');
    }
    
    public function ajax($id)
    {
        $cities = City::where('province_id', $id)->pluck('city_name', 'id');

        return $cities->toJson();
    }
}
