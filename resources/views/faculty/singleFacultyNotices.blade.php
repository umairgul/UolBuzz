@extends('layouts.main')
<title>Faculty - {{ config(('app.name')) }}</title>
@section('content')
<div class="container">

    @if(count($singleFaculty) == 0)
        <div class="col-md-offset-3 col-md-6 whitebox">
            <div class="row">
                <h5 class="page-header text-center">No Notices Found against Selected Faculty</h5>
            </div>
        </div>
    @else

        <div class="col-md-offset-3 col-md-6 whitebox">
            <div class="row">
                <h3 class="page-header text-center">Faculty Notices</h3>
            </div>
        </div>

    @foreach($singleFaculty as $notice)
        <div class="col-md-offset-3 col-md-6 whitebox">
            <div class="row">
                <h3 class="page-header text-center">{{ $notice->title }}</h3>
            </div>
            <div class="row">
                <p class="text-justify">{{ $notice->body }}</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <hr>
                    <h5 class="text-center">{{ $notice->name }}</h5>
                </div>
                <div class="col-md-4">
                    <hr>
                    <h5 class="text-center">{{ $notice->department_name }}</h5>
                </div>
                <div class="col-md-4">
                    <hr>
                    <h5 class="text-center">{{ $notice->updated_at }}</h5>
                </div>
            </div>
        </div>
    @endforeach
    @endif

        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                {{ $singleFaculty->links() }}
            </div>
        </div>
</div>

@endsection
