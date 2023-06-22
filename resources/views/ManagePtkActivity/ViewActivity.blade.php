
@extends('layouts.app')

@section('title', 'View Activities')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">View Activity Page</div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('PtkActivity') }}"> Back</a>
            </div>
            <div class="card-body">

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                          <tr> 
                            <th scope="col" style="width:40%"></th>
                            <th scope="col"></th>     
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" ><h6 style="font-weight:bold">Activity Details</h6></td>
                              </tr>
                          <tr>    
                            <td>Activity ID</td>
                            <td><h5 class="card-title">: {{ $activities->ACTIVITY_ID }}</h5></td>
                          </tr>
                          <tr>
                            <td>Club Name </td>
                            <td><h5 class="card-title">: {{ $activities->CLUB_NAME }}</h5></td>
                          </tr>
                          <tr>
                            <td>Advisor Club Name </td>
                            <td><h5 class="card-title">: {{ $activities->ADVISOR_CLUB_NAME }}</h5></td>
                          </tr>
                          <tr>
                            <td>Organizer</td>
                            <td><h5 class="card-title">: {{ $activities->ORGANIZER }}</h5></td>
                          </tr>
                          <tr>
                            <td>Application Type</td>
                            <td><h5 class="card-title">: {{ $activities->APPLICATION_TYPE }}</h5></td>
                          </tr>
                          <tr>
                            <td>Activity Name</td>
                            <td><h5 class="card-title">: {{ $activities->ACTIVITY_NAME }}</h5></td>
                          </tr>
                          <tr>
                            <td>Activity Type</td>
                            <td><h5 class="card-title">: {{ $activities->ACTIVITY_TYPE }}</h5></td>
                          </tr>
                          <tr>
                            <td>Participant Number</td>
                            <td><h5 class="card-title">: {{ $activities->PARTICIPANT_NUM }} people</h5></td>
                          </tr>
                          <tr>
                            <td>Venue</td>
                            <td><h5 class="card-title">: {{ $activities->VENUE }}</h5></td>
                          </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <thead>
                          <tr> 
                            <th scope="col" style="width:40%"></th>
                            <th scope="col"></th>     
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="2" ><h6 style="font-weight:bold">Activity Schedule</h6></td>
                          </tr>
                          <tr>
                            <td>Activity Start Date</td>
                            <td><h5 class="card-title">: {{ $activities->ACTIVITY_STARTDATE->format('Y-m-d') }}</h5></td>
                            
                          </tr>
                          <tr>
                            <td>Activity End Date</td>
                            <td><h5 class="card-title">: {{  $activities->ACTIVITY_ENDDATE->format('Y-m-d') }}</h5></td>
                            
                          </tr>
                          <tr>
                            <td>Activity Start Time</td>
                            <td><h5 class="card-title">: {{ $activities->ACTIVITY_STARTTIME-> format('H:i A')}}</h5></td>
                            
                          </tr>
                          <tr>
                            <td>Activity End Time</td>
                            <td><h5 class="card-title">: {{ $activities->ACTIVITY_ENDTIME -> format('H:i A') }}</h5></td>
                            
                          </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped">
                        <thead>
                          <tr> 
                            <th scope="col" style="width:40%"></th>
                            <th scope="col"></th>     
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2"><h6 style="font-weight:bold">Budget Information</h6></td>
                            </tr>
                          <tr>
                            <td>Budget</td>
                            <td><h5 class="card-title">: RM{{ $activities->BUDGET }}</h5></td>
                          </tr>
                        </tbody>
                      </table>


                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>

@endsection('content')


    @section('scripts')
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection
