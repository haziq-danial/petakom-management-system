<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ApprovalLevel;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{

    public $role = '';
    public $OwnerID = 0;

    public function index()
    {
//        return view('GenerateProposal.index', ['proposals' => $proposalModel]);

//        $this->role = Auth::user()->role;
//        $user = User::find(Auth::id());

//        $role = $user->role;
//        $proposalModel = Report::where('OwnerID', Auth::id())->get();
//        dd(Auth::user());

        $count = 0;

        if (Auth::user()->role === 'Student' || Auth::user()->role === 'Lecturer' || Auth::user()->role === 'PETAKOM Committee') {
            $proposals = Proposal::where('OwnerID', Auth::id())->get();

            return view('GenerateProposal.index', compact('proposals', 'count'));
        }

        if (Auth::user()->role === 'Coordinator') {
            $proposals = Proposal::where('coordinator_approval', ApprovalLevel::PENDING)
                ->where('hosd_approval', ApprovalLevel::PENDING)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateProposal.index-approval', compact('proposals', 'count'));
        }

        if (Auth::user()->role === 'Head of Student Development') {
            $proposals = Proposal::where('coordinator_approval', ApprovalLevel::APPROVED)
                ->where('hosd_approval', ApprovalLevel::PENDING)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateProposal.index-approval', compact('proposals', 'count'));
        }

        if (Auth::user()->role === 'Dean') {
            $proposals = Proposal::where('coordinator_approval', ApprovalLevel::APPROVED)
                ->where('hosd_approval', ApprovalLevel::APPROVED)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateProposal.index-approval', compact('proposals', 'count'));
        }
    }

    public function view($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        return view('GenerateProposal.view', ['proposal' => $proposalModel]);
    }

    public function create()
    {
        return view('GenerateProposal.create');
    }

    public function store(Request $request)
    {
        $proposalModel = new Proposal;

        $proposalModel->OwnerID = Auth::id();
//        $proposalModel->OwnerID = 1;
        $proposalModel->title = $request->title;
        $proposalModel->proposal_content = $request->proposal_content;
        $proposalModel->hosd_approval = ApprovalLevel::PENDING;
        $proposalModel->coordinator_approval = ApprovalLevel::PENDING;
        $proposalModel->dean_approval = ApprovalLevel::PENDING;

        $proposalModel->save();

        return redirect()->route('manage-proposal.index');
    }

    public function edit($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        return view('GenerateProposal.edit', ['proposal' => $proposalModel]);
    }

    public function update(Request $request, $ProposalID)
    {
        $proposalModel = Proposal::find($ProposalID);

        $proposalModel->OwnerID = Auth::id();
//        $proposalModel->OwnerID = $this->OwnerID;
        $proposalModel->title = $request->title;
        $proposalModel->proposal_content = $request->proposal_content;
        $proposalModel->hosd_approval = ApprovalLevel::PENDING;
        $proposalModel->coordinator_approval = ApprovalLevel::PENDING;
        $proposalModel->dean_approval = ApprovalLevel::PENDING;

        $proposalModel->save();

        return redirect()->route('manage-proposal.index');
    }

    public function approve($ReportID)
    {
        if (Auth::user()->role === 'Coordinator') {
            $this->coordinatorApproval($ReportID);
        }

        if (Auth::user()->role === 'Head of Student Development') {
            $this->hosdApproval($ReportID);
        }

        if (Auth::user()->role === 'Dean') {
            $this->deanApproval($ReportID);
        }

        return redirect()->route('manage-proposal.index');
    }

    public function reject($ReportID)
    {
        if (Auth::user()->role === 'Coordinator') {
            $this->coordinatorReject($ReportID);
        }

        if (Auth::user()->role === 'Head of Student Development') {
            $this->hosdReject($ReportID);
        }

        if (Auth::user()->role === 'Dean') {
            $this->deanReject($ReportID);
        }

        return redirect()->route('manage-proposal.index');
    }

    public function hosdApproval($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->hosd_approval = ApprovalLevel::APPROVED;
        $proposalModel->save();


    }

    public function coordinatorApproval($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->coordinator_approval = ApprovalLevel::APPROVED;
        $proposalModel->save();


    }

    public function deanApproval($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->dean_approval = ApprovalLevel::APPROVED;
        $proposalModel->save();


    }

    public function hosdReject($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->hosd_approval = ApprovalLevel::REJECTED;
        $proposalModel->save();


    }

    public function coordinatorReject($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->coordinator_approval = ApprovalLevel::REJECTED;
        $proposalModel->save();


    }

    public function deanReject($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->dean_approval = ApprovalLevel::REJECTED;
        $proposalModel->save();


    }
}
