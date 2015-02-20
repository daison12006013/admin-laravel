@extends('admin-laravel::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
@stop

@section('content_title')
@stop

@section('content')
<a href="{{Config::get('admin-laravel::routes.admin_user_lists.url')}}" class="btn btn-default"><span class="fa fa-chevron-left fa-w"></span> Back</a>
{{Form::open([])}}
  @if (isset($success_message))
  <div class="alert alert-success">
    {{$success_message}}
  </div>
  @endif

  <div class="form-group">
    <label>First Name</label>
    <input type="text" name="first_name" value="{{{$user['first_name']}}}" class="form-control">
  </div>
  <div class="form-group">
    <label>Middle Name</label>
    <input type="text" name="middle_name" value="{{{$user['middle_name']}}}" class="form-control">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" name="last_name" value="{{{$user['last_name']}}}" class="form-control">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{{$user['email']}}}" class="form-control">
  </div>
  <div class="form-group">
    <label>Employee Code</label>
    <input type="text" name="employee_code" value="{{{$user['employee_code']}}}" class="form-control">
  </div>
  <button class="btn btn-success pull-right" type="submit">Update</button>
{{Form::close()}}
@stop

@section('javascript')
<script type="text/javascript">
</script>
@stop