@extends('layouts.dashboard')
<title>Edit | Dashboard - {{ config(('app.name')) }}</title>
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3" style="background: white">

            @if(count($errors)>0)
                <div class="row" style="padding-left: 10px; padding-right: 10px; padding-top: 10px">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if(Auth::id() != $noticeId->user_id)
                <div class="row">
                    <h2 class="page-header text-center">Access Denied</h2>
                </div>
            @else

                <div class="row">
                    <h2 class="page-header text-center">Edit Notice</h2>
                </div>

                <form action="{{ route('dashboard.update',['noticeId' => $noticeId->id]) }}" method="POST" style="padding-left: 10px; padding-right: 10px;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group">
                            <input type="text" class="form-control" name="noticeTitle" placeholder="Give Title to Notice" value="{{ $noticeId->title }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <textarea name="noticeBody" cols="30" rows="8" class="form-control"
                             placeholder="Add Notice Details Here" style="resize: none">{{ $noticeId->body }}</textarea>
                        </div>
                    </div>

                    {{--<div class="row">--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="file" class="form-control" name="attachment" value="Attach">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="row">
                        <div class="form-group">
                            <button type="submit" name="saveBtn" class="btn btn-default btn-sm btn-block">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <input type="hidden" name="_method" value="PUT">
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    @endsection
