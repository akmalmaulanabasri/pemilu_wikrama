<?php

namespace App\Http\Controllers;

use App\Rayon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RayonController extends Controller
{
    public function index()
    { 
        $rayons = Rayon::all();

        return view('rayon.index', compact('rayons'));
    }

    public function store(Request $request)
    {
        Rayon::create(
            $request->all()
        );

        return redirect()->route('rayon.index')->with('message', 'Berhasil menambah rayon');
    }

    public function edit($id)
    {
        $rayons = Rayon::all();
        $rayon = Rayon::findOrFail($id);

        return view('rayon.index', compact('rayons', 'rayon'));
    }


    public function update(Request $request, $id)
    {
        $rayon = Rayon::findOrFail($id);
        
        $rayon->update(
            $request->all()
        );

        return redirect()->route('rayon.index')->with('message', 'Berhasil mengubah rayon');
    }

    public function destroy($id)
    {
        $rayon = Rayon::findOrFail($id);

        $rayon->delete();

        return redirect()->route('rayon.index')->with('message', 'Berhasil menghapus rayon');
    }
}
