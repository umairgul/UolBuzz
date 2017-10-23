@extends('layouts.main')
<title>Departments - {{ config(('app.name')) }}</title>
@section('content')
<div class="container">
    <div row>
        <h2 class="text-center">All Departments <i class="fa fa-university x-5"></i></h2>
    </div>

    <div class="row" style="background-color: white;">
        @foreach($departments as $department)
            <div class="col-md-3">
                <a href="{{ route('departments.show',
                ['$departmentId' => $department->id]) }}"><h5 class="page-header text-center">{{ $department->department_name }}</h5></a>
            </div>
        @endforeach
    </div>

</div>

@endsection
