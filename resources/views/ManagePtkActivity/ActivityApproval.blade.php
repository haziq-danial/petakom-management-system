
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>PETAKOM Activity Approval Dashboard</h2>
                    </div>
                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Activity ID</th>
                                        <th>Club Name</th>
                                        <th>Advisor Club Name</th>
                                        <th>Activity Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($activities as $activity)
                                    <tr>
                                        <td>{{ $activity->ACTIVITY_ID }}</td>
                                        <td>{{ $activity->CLUB_NAME }}</td>
                                        <td>{{ $activity->ADVISOR_CLUB_NAME }}</td>
                                        <td>{{ $activity->ACTIVITY_NAME }}</td>
 
                                        <td>
                                            <a href="{{ url('/ActivityApproval/' . $activity->id) }}" title="View Activity"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/ActivityApproval/' . $activity->id . '/edit') }}" title="Approve Activity"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Approve</button></a>
 
                                            <form method="POST" action="{{ url('/ActivityApproval' . '/' . $activity->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Activity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection