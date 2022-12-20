<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Vote;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VoteController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        $votes = Vote::all();

        return view('vote.index', compact('candidates', 'votes'));
    }

    public function indexguru()
    {
        $candidates = Candidate::all();
        $votes = Vote::all();

        return view('vote.guru', compact('candidates', 'votes'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $today = \Carbon\Carbon::now();

        if(Auth::user()->is_admin == 0){

        DB::beginTransaction();

        DB::insert("
            INSERT INTO votes
            (user_id, candidate_id, created_at, updated_at)
            VALUES(?, ?, ?, ?)
        ", [$user->id, $request->candidate_id_10, $today, $today]);

         DB::insert("
            INSERT INTO votes
            (user_id, candidate_id, created_at, updated_at)
            VALUES(?, ?, ?, ?)
        ", [$user->id, $request->candidate_id_11, $today, $today]);

         DB::insert("
            INSERT INTO votes
            (user_id, candidate_id, created_at, updated_at)
            VALUES(?, ?, ?, ?)
        ", [$user->id, $request->candidate_id_12, $today, $today]);
        }

        elseif(Auth::user()->is_admin == 2){

        Vote::create(
            $request->all()
        );
        
        }

        $user->is_voting = 1;

        $user->save();

        DB::commit();

        return redirect()->route('home')->with('message', 'Anda telah berhasil memilih calon ketua');
    }
}
