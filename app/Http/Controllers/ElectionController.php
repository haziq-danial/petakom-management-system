<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'Student') {
            return view('ManageElection.index-student');
        }

        if (Auth::user()->role === 'PETAKOM Committee' || Auth::user()->role === 'PETAKOM Committee'
            || Auth::user()->role === 'Coordinator' || Auth::user()->role === 'Head of Student Development') {
            return view('ManageElection.index-approval');
        }
    }
}
