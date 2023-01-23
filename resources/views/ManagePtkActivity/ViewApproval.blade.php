
@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">View Activity Page</div>
  <div class="pull-right">
	<a class="btn btn-primary" href="{{ url('ActivityApproval') }}"> Back</a>
</div>
<div class="card-body">
  
    <div class="card-body">
    <h5 class="card-title">Activity ID : {{ $activities->ACTIVITY_ID }}</h5>
    <h5 class="card-title">Club Name : {{ $activities->CLUB_NAME }}</h5>
    <h5 class="card-title">Advisor Club Name : {{ $activities->ADVISOR_CLUB_NAME }}</h5>
    <h5 class="card-title">Organizer  : {{ $activities->ORGANIZER }}</h5>
    <h5 class="card-title"> Application Type : {{ $activities->APPLICATION_TYPE }}</h5>
    <h5 class="card-title">Activity Name : {{ $activities->ACTIVITY_NAME }}</h5>
    <h5 class="card-title">Activity Type : {{ $activities->ACTIVITY_TYPE }}</h5>
    <h5 class="card-title">Participant Number : {{ $activities->PARTICIPANT_NUM }}</h5>
    <h5 class="card-title">Venue  : {{ $activities->VENUE }}</h5>
    <h5 class="card-title">Activity Start Date  : {{ $activities->ACTIVITY_STARTDATE }}</h5>
    <h5 class="card-title">Activity End Date  : {{ $activities->ACTIVITY_ENDDATE }}</h5>
    <h5 class="card-title">Activity Start Time  : {{ $activities->ACTIVITY_STARTTIME }}</h5>
    <h5 class="card-title">Activity End Time  : {{ $activities->ACTIVITY_ENDTIME }}</h5>
    <h5 class="card-title">Budget : {{ $activities->BUDGET }}</h5>
</div>
@endsection('content')