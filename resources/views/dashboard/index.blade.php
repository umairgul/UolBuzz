@extends('layouts.dashboard')
<title>Welcome | Dashboard - {{ config(('app.name')) }}</title>
@section('content')
    <div class="container">
        <div class="row">

            @if (count($notices)==0)
                <div class="col-md-6 col-md-offset-3 whitebox" >
                    <div class="row">
                        <h3 class="page-header text-center">No Notice Posted</h3>
                        <h5 style="padding-left: 5px;"><a href="{{ route('dashboard.add') }}">Post Now</a></h5>
                    </div>
                </div>

            @else

                <div class="col-md-6 col-md-offset-3" style="background: white; margin-bottom: 10px">
                    <div class="row">
                        <h3 class="page-header text-center">Posted Notices</h3>
                    </div>
                </div>

                @foreach($notices as $notice)
                    <div class="col-md-6 col-md-offset-3 whitebox">
                        <div class="row">
                            <h3 class="page-header text-center">{{ $notice->title }}</h3>
                        </div>

                        {{--<div class="row">--}}
                        {{--<p class="text-justify">{{ $notice->body }}</p>--}}
                        {{--</div>--}}

                        <div class="row"  style = "padding-bottom: 10px;">


                            <div class="col-md-4 text-center">
                                <a href="{{ route('dashboard.show',['noticeId' => $notice->id]) }}" data-toggle="tooltip" title="Watch" class="btn btn-default btn-sm btn-block">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>



                            <div class="col-md-4 text-center">
                                <a href="{{ route('dashboard.edit',['noticeId' => $notice->id ]) }}" data-toggle="tooltip" title="Edit" class="btn btn-default btn-sm btn-block">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </div>



                            <div class="col-md-4 text-center">
                                <form onsubmit="return confirm('Do you really want to Delete this Notice?');" action="{{ route('dashboard.delete',['noticeId' => $notice->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" name="delBtn" data-toggle="tooltip" title="Delete" class="btn btn-default btn-sm btn-block t">
                                        <li class="fa fa-trash-o"></li>
                                    </button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </div>


                        </div>
                    </div>
                @endforeach

            @endif

            <div class="col-md-6 col-md-offset-3" style="background: white;margin-bottom: 2px;">
                <div class="row">
                    {{ $notices->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection
