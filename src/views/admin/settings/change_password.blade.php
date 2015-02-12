@extends('admin::admin.layouts.panel')

@section('title')
Change Password
@stop

@section('css_internal')
@stop

@section('content_title')
Change your password
@stop

@section('content')
  <div class="col-sm-12">
    @if (Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    @if (Session::has('error'))
      <div class="alert alert-danger">{{Session::get('error')}}</div>
    @endif
    
    {{Form::open()}}
      <div class="form-group">
        <label>Old Password</label>
        <input type="password" required name="old_password" class="form-control">
      </div>
      <div class="form-group">
        <label>New Password</label>
        <input type="password" required name="new_password" class="form-control">
      </div>
      <div class="form-group">
        <label>Confirm New Password</label>
        <input type="password" required name="confirm_new_password" class="form-control">
      </div>
      <div class="form-group pull-right">
        <button type="submit" class="btn btn-success">Change</button>
      </div>
    {{Form::close()}}
  </div>
@stop

@section('javascript')
@stop