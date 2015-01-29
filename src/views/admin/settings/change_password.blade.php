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
  <div class="col-sm-6">
    {{Form::open(['class' => 'form-horizontal'])}}
      <div class="form-group">
        <label>Old Password</label>
        <input type="text" name="old_password" class="form-control">
      </div>
      <div class="form-group">
        <label>Re-type Old Password</label>
        <input type="text" name="re_old_password" class="form-control">
      </div>
    {{Form::close()}}
  </div>
@stop

@section('javascript')
@stop