@extends('layouts.dashboard')

@section('content')

    <div class="container">

        @if(count($myfiles) == 0)
            <div class="col-md-offset-3 col-md-6 whitebox">
                <div class="row">
                    <h5 class="page-header text-center">No Files Uploaded</h5>
                </div>
            </div>
        @else

            <div class="col-md-offset-3 col-md-6 whitebox">
                <div class="row">
                    <h3 class="page-header text-center">My Files</h3>
                </div>
            </div>

            @foreach($myfiles as $file)
                <div class="col-md-offset-3 col-md-6 whitebox">
                    <form onsubmit="return confirm('Delete File?');" action="{{ route('dashboard.deleteFile',['fileId' => $file->id]) }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <h5 class="page-header">{{ $file->filename }}</h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group pull-right">
                                    <button class="btn btn-default btn-sm" style="margin-top: 20px"><i class="fa fa-trash-o"></i></button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        @endif

        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                {{ $myfiles->links() }}
            </div>
        </div>
    </div>

@endsection