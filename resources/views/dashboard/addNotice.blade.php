@extends('layouts.dashboard')
<title>Add | Dashboard - {{ config(('app.name')) }}</title>
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3" style="background: white">
        <!-- <div class="col-md-12" style="background: white"> -->

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

            <div class="row">
                <h2 class="page-header text-center">Add Notice</h2>
            </div>

            <form action="{{ route('dashboard.store') }}" method="POST" style="padding-left: 10px; padding-right: 10px;" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-control" name="noticeTitle" placeholder="Give Title to Notice" value="{{ old('noticeTitle') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <textarea name="noticeBody" id="" cols="30" rows="8" class="form-control" placeholder="Add Notice Details Here" style="resize: none"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <button type="submit" name="postBtn" class="btn btn-default btn-sm btn-block"><i class="fa fa-send-o"></i> Post</button>
                    </div>
                </div>
            </form>
        <!-- </div> -->

        {{-- <div class="col-md-6" style="background: white">

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

            <div class="row">
                <h2 class="page-header text-center">Upload File</h2>
            </div>

            <form action="{{ route('dashboard.uploadfile') }}" method="POST" style="padding-left: 10px; padding-right: 10px;" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group">
                        <input type="file" class="form-control" name="attachment" value="Attach">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <button type="submit" name="postBtn" class="btn btn-default btn-sm btn-block"><i class="fa fa-send-o"></i> Post</button>
                    </div>
                </div>
            </form>
        </div> --}}
        </div>
    </div>
@endsection
