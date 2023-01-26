<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ApprovalLevel;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{

    public $role = 'Student';
    public function index()
    {
//        return view('GenerateProposal.index', ['proposals' => $proposalModel]);

//        $role = 'Coordinator';
        $count = 0;
//        $user = User::find(Auth::id());

//        $role = $user->role;
//        $proposalModel = Report::where('OwnerID', Auth::id())->get();


        if ($this->role === 'Student' || $this->role === 'Lecturer' || $this->role === 'PETAKOM Committee') {
            $proposals = Proposal::where('OwnerID', 1)->get();

            return view('GenerateProposal.index', compact('proposals', 'count'));
        }

        if ($this->role === 'Coordinator') {
            $proposals = Proposal::where('coordinator_approval', ApprovalLevel::PENDING)
                ->where('hosd_approval', ApprovalLevel::PENDING)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateProposal.index-approval', compact('proposals', 'count'));
        }

        if ($this->role === 'Head of Student Development') {
            $proposals = Proposal::where('coordinator_approval', ApprovalLevel::APPROVED)
                ->where('hosd_approval', ApprovalLevel::PENDING)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateProposal.index-approval', compact('proposals', 'count'));
        }

        if ($this->role === 'Dean') {
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

//        $proposalModel->OwnerID = Auth::id();
        $proposalModel->OwnerID = 1;
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

//        $proposalModel->OwnerID = Auth::id();
        $proposalModel->OwnerID = 1;
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
        if ($this->role === 'Coordinator') {
            $this->coordinatorApproval($ReportID);
        }

        if ($this->role === 'Head of Student Development') {
            $this->hosdApproval($ReportID);
        }

        if ($this->role === 'Dean') {
            $this->deanApproval($ReportID);
        }

        return redirect()->route('manage-proposal.index');
    }

    public function reject($ReportID)
    {
        if ($this->role === 'Coordinator') {
            $this->coordinatorReject($ReportID);
        }

        if ($this->role === 'Head of Student Development') {
            $this->hosdReject($ReportID);
        }

        if ($this->role === 'Dean') {
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
