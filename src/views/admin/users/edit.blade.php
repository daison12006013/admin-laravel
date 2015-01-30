@extends('admin::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
@stop

@section('content_title')
@stop

@section('content')
<a href="{{Config::get('admin::routes.admin_user_lists.url')}}" class="btn btn-default">Back</a>
{{Form::open([])}}
  <div class="form-group">
    <label>First Name</label>
    <input type="text" name="first_name" class="form-control">
  </div>
  <div class="form-group">
    <label>Middle Name</label>
    <input type="text" name="middle_name" class="form-control">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" name="last_name" class="form-control">
  </div>
  <div class="form-group">
    <label>Employee Code</label>
    <input type="text" name="employee_code" class="form-control">
  </div>
  <button class="btn btn-success pull-right" type="submit">Save</button>
{{Form::close()}}
@stop

@section('javascript')
<script type="text/javascript">
</script>
@stop