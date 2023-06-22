<?php

namespace App\Http\Controllers;

use App\Models\VoteDay;
use Illuminate\Http\Request;

class VoteDayController extends Controller
{
    public function dayVote()
    {
        
        $id = 1;
        $vote = VoteDay::find($id);
    
        return view('ManageElection.setvotingdate')->with('vote', $vote);
    }


    public function updateDayVote(Request $request, $id)
    {
        $id = 1;
        $vote = VoteDay::find($id);
        $input = $request->all();
        $vote->update($input);
    
        return view('ManageElection.setvotingdate')->with('vote', $vote);  
    }
}
