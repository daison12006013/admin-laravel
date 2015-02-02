@extends('admin::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
@stop

@section('content_title')
@stop

@section('content')
<a href="{{Config::get('admin::routes.admin_role_lists.url')}}" class="btn btn-default"><span class="fa fa-chevron-left fa-w"></span> Back</a>
{{Form::open([])}}
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
    <label>Name</label>
    <input type="text" name="name" value="{{{$role['name']}}}" class="form-control">
  </div>
  <button class="btn btn-success pull-right" type="submit">Update</button>
{{Form::close()}}
@stop

@section('javascript')
<script type="text/javascript">
</script>
@stop