@extends('layouts.main')
<title>Faculty - {{ config(('app.name')) }}</title>
@section('content')
<div class="container">
        <div row>
            <h2 class="text-center">All Faculty <i class="fa fa-users x-5"></i></h2>
        </div>

        <div class="row" style="background-color: white;">
            @foreach($faculties as $faculty)
            <div class="col-md-3">
                <a href="{{ route('faculty.show',
                ['facultyId' => $faculty->username]) }}"><h5 class="page-header text-center">{{ $faculty->name }}</h5></a>
            </div>
            @endforeach
        </div>

</div>

@endsection
