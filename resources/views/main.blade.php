@extends('layouts.main')

@section('content')
    <div class="container">


        @if (count($allNotices)==0)
            <div class="col-md-6 col-md-offset-3 whitebox" >
                <div class="row">
                    <h3 class="page-header text-center">No Notice Found</h3>
                </div>
            </div>
        @else
        

      <div class="col-md-offset-3 col-md-6" style="background: white; margin-bottom: 10px">
          <div class="row">
              <h3 class="page-header text-center">Recently Posted</h3>
          </div>
      </div>
        @foreach($allNotices as $notice)
        <div class="col-md-offset-3 col-md-6 whitebox" title="{{ $notice->id }}" data-toggle="tooltip">
            <div class="row">
                <h3 class="page-header text-center">{{ $notice->title }}</h3>
            </div>
            <div class="row">
                <p>{{ $notice->body }}</p>
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
            <div class="col-md-offset-3 col-md-6" style="margin-bottom: 10px">
                <div class="row">
                    {{ $allNotices->links() }}
                </div>
            </div>
    </div>
    @endsection
