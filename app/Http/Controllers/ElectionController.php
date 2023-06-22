<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\VoteDay;
use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\ElectedStudent;
use Illuminate\Support\Facades\Auth;
use App\Classes\Constants\ApprovalLevel;

class ElectionController extends Controller
{

    public function elections()
    {
        $id = 1;
        $date = VoteDay::find($id);
        $dt = Carbon::now()->format('d-m-y');

        $candidates = Candidate::where('petakom_approval', ApprovalLevel::APPROVED)->get();
        $count = 0;

        return view('ManageElection.vote-election', compact('candidates', 'count'))->with('dt',$dt)->with('date', $date);
        
    }

    public function vote($candidate_id)
    {
        $election = new Election;
        $election->candidate_id = $candidate_id;
        $election->vote_user_id = Auth::id();

        $election->save();

        return redirect()->route('manage-election.elections');
    }

    public function listVotes()
    {
        $candidates = Candidate::get();
        $count = 0;

//        dd($candidates);
        return view('ManageElection.candidate-votes', compact('candidates', 'count'));
    }

    public function declareWinner($candidate_id)
    {
        $elected_std = new ElectedStudent;

        $elected_std->candidate_id = $candidate_id;
        $elected_std->hosd_approval = ApprovalLevel::PENDING;
        $elected_std->coo_approval = ApprovalLevel::PENDING;

        $elected_std->save();
        return redirect()->route('manage-election.list-votes');
    }
}
