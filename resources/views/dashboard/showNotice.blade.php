@extends('layouts.dashboard')
<title>Watch | Dashboard - {{ config(('app.name')) }}</title>
@section('content')
<div class="container">

        <div class="col-md-offset-3 col-md-6 whitebox">
            @if(Auth::id() != $singlenotice->user_id)
            <div class="row">
                <h3 class="page-header text-center">Access Denied!</h3>
            </div>
            @else
            <div class="row">
                <h3 class="page-header text-center">{{ $singlenotice->title }}</h3>
            </div>
            <div class="row">
                <p class="text-justify">{{ $singlenotice->body }}</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <h5 class="text-center" data-toggle="tooltip" data-placement="bottom" title="Posting Date">{{ $singlenotice->created_at }}</h5>
                </div>
                <div class="col-md-6">
                    <hr>
                    <h5 class="text-center" data-toggle="tooltip" data-placement="bottom" title="Last Updated">{{ $singlenotice->updated_at }}</h5>
                </div>
            </div>

            <div class="row" style="padding-bottom: 10px">
                <div class="col-md-12">
                    <a href="{{ route('dashboard.edit',['noticeId' => $singlenotice->id]) }}" class="btn btn-default btn-sm btn-block">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                </div>
            </div>
            @endif
        </div>

</div>

@endsection
