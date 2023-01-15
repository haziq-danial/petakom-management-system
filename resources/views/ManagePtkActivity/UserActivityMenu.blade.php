@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Club Activities Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Activity Name</th>
                            <th>Category</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
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
