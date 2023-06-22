@extends('layouts.app')

@section('title', 'Vote Elections')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('content')



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Vote Date</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Set Vote Date</h3>
        </div>
        <!-- /.card-header -->

        {{-- Not function --}}
        <form action="{{ url('manage-election/update/' .$vote->id) }}" method="post"  >
            @csrf
            <div class="card-body">
                <label>Vote Date</label>
                <input type="date" name="VOTE_DATE" id="VOTE_DATE"  class="form-control">

                <label>Vote Start Time</label>
                <input type="time" name="VOTE_STARTTIME" id="VOTE_STARTTIME" class="form-control">

                <label>Vote End Time</label>
                <input type="time" name="VOTE_ENDTIME" id="VOTE_ENDTIME" class="form-control">
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary"></i> Set Date</button>
                </div>
                <a href="{{ route('manage-report.index') }}" class="btn btn-default"></i> Cancel</a>
            </div>
        </form>

        <!-- /.card-footer -->
    </div>
</section>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

@endsection
