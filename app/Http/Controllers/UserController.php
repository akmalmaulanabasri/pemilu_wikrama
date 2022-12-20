<?php

namespace App\Http\Controllers;

use App\Rayon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', 0)->get();
        $rayons = Rayon::all();
        
        return view('users.index', compact('users', 'rayons'));
    }

    public function store(Request $request)
    {
        User::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'sex' => $request->sex,
            'rayon_id' => $request->rayon_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message', 'Berhasil mendaftarkan pemilih');
    }

    public function edit($id)
    {
        $users = User::where('is_admin', 0)->get();
        $rayons = Rayon::all();

        $user = User::findOrFail($id);
        
        return view('users.index', compact('users', 'rayons', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $isPasswordChanged = false;

        if ($request->password == "") {
            $isPasswordChanged = false;
        } else {
            $isPasswordChanged = true;
        }

        $user->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'sex' => $request->sex,
            'rayon_id' => $request->rayon_id,
            'password' => ($isPasswordChanged) ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('message', 'Berhasil mengubah data pemilih');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('message', 'Berhasil menghapus pemilih');
    }
}
