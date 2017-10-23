@extends('layouts.main')

@section('content')
    <div class="container">

        @if(count($facultyFiles) == 0)
            <div class="col-md-offset-3 col-md-6 whitebox">
                <div class="row">
                    <h5 class="page-header text-center">No Files Found against Selected Faculty</h5>
                </div>
            </div>
        @else

            <div class="col-md-offset-3 col-md-6 whitebox">
                <div class="row">
                    <h3 class="page-header text-center">Faculty Files</h3>
                </div>
            </div>

            @foreach($facultyFiles as $file)
                <div class="col-md-offset-3 col-md-6 whitebox">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="page-header text-center"><a href="../files/{{ $file->filename }}" download="{{ $file->filename }}">{{ $file->filename }}</a></h5>
                        </div>

                        <div class="col-md-4">
                            <h5 class="page-header text-center">{{ $file->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                {{ $facultyFiles->links() }}
            </div>
        </div>
    </div>

@endsection