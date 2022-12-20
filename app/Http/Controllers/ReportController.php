<?php

namespace App\Http\Controllers;

use DB;
use App\Candidate;
use App\User;
use App\Vote;
use Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        $jumlah = DB::table('votes')->count(['id']);
        $user = Auth::user()->is_admin;
        return view('report.index', compact( 'candidates','user','jumlah'));
    }

    public function chart()
    {
        $candidates = Candidate::all();
        $votes = [];

        foreach ($candidates as $c) {
            $votes['names'][] = $c->name;
            $votes['votes'][] = Vote::where('candidate_id', $c->id)->get()->count();
        }

        return response()->json($votes);
    }
}
