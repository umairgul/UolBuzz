@extends('layouts.main')

@section('content')
    <div class="container">
        <div row>
            <h2 class="text-center">Chose Faculty Member <i class="fa fa-user-secret x-5"></i></h2>
        </div>

        <div class="row" style="background-color: white;">
            @foreach($faculties as $faculty)
                <div class="col-md-3">
                    <a href="{{ route('files.show',
                ['facultyId' => $faculty->username]) }}"><h5 class="page-header text-center">{{ $faculty->name }}</h5></a>
                </div>
            @endforeach
        </div>

    </div>

@endsection