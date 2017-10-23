@extends('layouts.app')

@section('content')
<div class="container">

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

  <div class="col-md-6 col-md-offset-3" style="background: white; margin-bottom: 10px">
    <div class="row">
      <h3 class="text-center page-header">Change Password</h3>
    </div>
  </div>

  <div class="col-md-6 col-md-offset-3" style="background: white; margin-bottom: 10px">
      <form class="form-horizontal" action="{{ route('changepass.change') }}" method="post" style="padding:10px">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="password" name="oldPassword" class="form-control" placeholder="Enter Old Password" required>
        </div>
        <div class="form-group">
          <input type="password" name="newPassword" class="form-control" placeholder="Enter New Password" required>
        </div>
        <div class="form-group">
          <button type="submit" name="changepass" class="btn btn-default btn-block">Change Password</button>
          <!-- <input type="hidden" name="_method" value="PUT"> -->
        </div>
      </form>
  </div>

</div>
@endsection
