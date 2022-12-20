<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Rayon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        $rayons = Rayon::all();

        return view('candidates.index', compact('candidates', 'rayons'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = "candidates_" . uniqid() . $file->getClientOriginalName();
            $folder = public_path('images/candidates/');
            $file->move($folder, $name);

            Candidate::create([
                'image' => $name,
                'nis' => $request->nis,
                'name' => $request->name,
                'sex' => $request->sex,
                'rayon_id' => $request->rayon_id,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'latar_belakang' => $request->latar_belakang,
            ]);

            return redirect()->route('candidates.index')->with('message', 'Berhasil mendaftarkan kandidat');
        }
    }

    public function edit($id)
    {
        $candidates = Candidate::all();
        $rayons = Rayon::all();

        $candidate = Candidate::findOrFail($id);

        return view('candidates.index', compact('candidates', 'rayons', 'candidate'));
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = "candidates_" . uniqid() . $file->getClientOriginalName();
            $folder = public_path('images/candidates/');
            $file->move($folder, $name);

            $candidate->update([
                'image' => $name,
                'nis' => $request->nis,
                'name' => $request->name,
                'sex' => $request->sex,
                'rayon_id' => $request->rayon_id,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'latar_belakang' => $request->latar_belakang
            ]);
        } else {
            $candidate->update([
                'name' => $request->name,
                'sex' => $request->sex,
                'rayon_id' => $request->rayon_id,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'latar_belakang' => $request->latar_belakang

            ]);
        }

        return redirect()->route('candidates.index')->with('message', 'Berhasil mengubah data kandidat');
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);

        $candidate->delete();

        return redirect()->route('candidates.index')->with('message', 'Berhasil menghapus kandidat');
    }

    public function show($id)
    {
        $candidates = Candidate::all();
        $rayons = Rayon::all();

        $candidate = Candidate::findOrFail($id);

        return view('candidates.show', compact('candidates', 'rayons', 'candidate'));
    }
}
