@extends('admin-laravel::admin.layouts.plain')

@section('title')
@stop

@section('css_internal')
<style type="text/css">
.form-login-heading {
  background-color:#FF6103 !important;
}
</style>
@stop

@section('content_title')
@stop

@section('content')

@if ($user_found)

  {{Form::open(['method' => 'POST', 'class' => 'form-login'])}}
    <h2 class="form-login-heading">Reset your password</h2>
    
    <div class="login-wrap">
        @if (Session::has('error'))
          <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        <input type="password" name="new_password" class="form-control" placeholder="New Password" autofocus><br>
        <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm New Password"><br>
        <button class="btn btn-theme btn-block" href="index.html" type="submit">Submit</button>
    </div>
  {{Form::close()}}

@else

  <div class="form-login">
    <div class="login-wrap">
      We cant find your request. Please try again, <a href="{{URL::to(Config::get('admin-laravel::routes.admin.url'))}}">Click Here</a>.
    </div>
  </div>

@endif
@stop

@section('javascript')
<script type="text/javascript">
  $(function() {
  });
</script>
@stop