@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>PETAKOM Activities Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Activity ID</th>
                            <th>Name</th>
                            <th>Club Name</th>
                            <th>Club advisor name</th>
                            <th>Organizer</th>
                            <th>Application type</th>
                            <th>Organizer</th>
                            <th>Organizer</th>
                            <th>Organizer</th>
                            <th>Organizer</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->ACTIVITY_ID }}</td>
                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->category->name }}</td>
                                <td>{{ $activity->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection