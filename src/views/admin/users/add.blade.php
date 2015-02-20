@extends('admin-laravel::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
@stop

@section('content_title')
@stop

@section('content')
<a href="{{Config::get('admin-laravel::routes.admin_user_lists.url')}}" class="btn btn-default"><span class="fa fa-chevron-left fa-w"></span> Back</a>
{{Form::open(['autocomplete' => 'off'])}}
  @if (Session::has('success'))
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
  @endif

  @if (Session::has('error'))
  <div class="alert alert-danger">
    {{Session::get('error')}}
  </div>
  @endif


  <div class="form-group">
    <label>Email</label>
    {{Form::email('email', '', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" required name="password" class="form-control">
  </div>
  <div class="form-group">
    <label>First Name</label>
    {{Form::text('first_name', '', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    <label>Middle Name</label>
    {{Form::text('middle_name', '', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    <label>Last Name</label>
    {{Form::text('last_name', '', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    <label>Employee Code</label>
    {{Form::text('employee_code', '', ['class' => 'form-control'])}}
  </div>
  <button class="btn btn-success pull-right" type="submit">Save</button>
{{Form::close()}}
@stop

@section('javascript')
<script type="text/javascript">
</script>
@stop