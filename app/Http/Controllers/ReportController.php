<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ApprovalLevel;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $role = 'Coordinator';
        $count = 0;
//        $user = User::find(Auth::id());

//        $role = $user->role;
//        $proposalModel = Report::where('OwnerID', Auth::id())->get();


        if ($role === 'Student' || $role === 'Lecturer' || $role === 'PETAKOM Committee') {
            $reports = Report::where('OwnerID', 1)->get();
//            dd($reportModel);
            return view('GenerateReport.index', compact('reports', 'count'));
        }

        if ($role === 'Coordinator') {
            $reports = Report::where('coordinator_approval', ApprovalLevel::PENDING)
                ->where('hosd_approval', ApprovalLevel::PENDING)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateReport.index-approval', compact('reports', 'count'));
        }

        if ($role === 'Head of Student Development') {
            $reports = Report::where('coordinator_approval', ApprovalLevel::APPROVED)
                ->where('hosd_approval', ApprovalLevel::PENDING)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateReport.index-approval', compact('reports', 'count'));
        }

        if ($role === 'Dean') {
            $reports = Report::where('coordinator_approval', ApprovalLevel::APPROVED)
                ->where('hosd_approval', ApprovalLevel::APPROVED)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateReport.index-approval', compact('reports', 'count'));
        }
    }

    public function view($ReportID)
    {
        $report = Report::where('ReportID', $ReportID)->first();

        return view('GenerateReport.view', ['report' => $report]);
    }

    public function create()
    {
        return view('GenerateReport.create');
    }

    public function store(Request $request)
    {
//        dd($request);
        $reportModel = new Report;

//        $reportModel->OwnerID = Auth::id();
        $reportModel->OwnerID = 1;
        $reportModel->title = $request->title;
        $reportModel->report_content = $request->report_content;
        $reportModel->hosd_approval = ApprovalLevel::PENDING;
        $reportModel->coordinator_approval = ApprovalLevel::PENDING;
        $reportModel->dean_approval = ApprovalLevel::PENDING;

        $reportModel->save();

        return redirect()->route('manage-report.index');
    }

    public function edit($ReportID)
    {
        $report = Report::where('ReportID', $ReportID)->first();

        return view('GenerateReport.edit', ['report' => $report]);
    }

    public function update(Request $request, $ReportID)
    {
        $reportModel = Report::find($ReportID);

//        $reportModel->OwnerID = Auth::id();
        $reportModel->OwnerID = 1;
        $reportModel->title = $request->title;
        $reportModel->report_content = $request->report_content;
        $reportModel->hosd_approval = ApprovalLevel::PENDING;
        $reportModel->coordinator_approval = ApprovalLevel::PENDING;
        $reportModel->dean_approval = ApprovalLevel::PENDING;

        $reportModel->save();

        return redirect()->route('manage-report.index');
    }

    public function destroy($ReportID)
    {

    }

    public function hosdApproval($ReportID)
    {
        $reportModel = Report::where('ProposalID', $ReportID)->first();

        $reportModel->hosd_approval = ApprovalLevel::APPROVED;
        $reportModel->save();

        return redirect()->route('manage-report.index');
    }

    public function coordinatorApproval($ReportID)
    {
        $reportModel = Report::where('ReportID', $ReportID)->first();

        $reportModel->coordinator_approval = ApprovalLevel::APPROVED;
        $reportModel->save();

        return redirect()->route('manage-report.index');
    }

    public function deanApproval($ReportID)
    {
        $reportModel = Report::where('ReportID', $ReportID)->first();

        $reportModel->dean_approval = ApprovalLevel::APPROVED;
        $reportModel->save();

        return redirect()->route('manage-report.index');
    }

    public function hosdReject($ReportID)
    {
        $reportModel = Report::where('ReportID', $ReportID)->first();

        $reportModel->hosd_approval = ApprovalLevel::REJECTED;
        $reportModel->save();

        return redirect()->route('manage-report.index');
    }

    public function coordinatorReject($ReportID)
    {
        $reportModel = Report::where('ReportID', $ReportID)->first();

        $reportModel->coordinator_approval = ApprovalLevel::REJECTED;
        $reportModel->save();

        return redirect()->route('manage-report.index');
    }

    public function deanReject($ReportID)
    {
        $reportModel = Report::where('ReportID', $ReportID)->first();

        $reportModel->dean_approval = ApprovalLevel::REJECTED;
        $reportModel->save();

        return redirect()->route('manage-report.index');
    }
}
