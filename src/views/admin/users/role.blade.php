@extends('admin-laravel::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
@stop

@section('content_title')
@stop

@section('content')
<?php 
  // $current_url = URL::to(Route::getCurrentRoute()->getPath());
?>
<a href="{{URL::to(Config::get('admin-laravel::routes.admin_user_lists.url'))}}" class="btn btn-default"><span class="fa fa-chevron-left fa-w"></span> Back</a>
<div class="row">
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

  <div class="col-sm-5">
    <h4>Groups:</h4>
    <div class="">
      <table class="table table-bordered">
        @forelse ($user_roles as $role)
          <tr>
            <td>{{$role['name']}}</td>
            <td style="width:1px;">
              <a href="{{URL::current()}}/{{$role['id']}}/delete" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        @empty
          <tr>
            <td><i>{{Config::get('admin-laravel::lang/lang.role_not_found')}}</i></td>
          </tr>
        @endforelse
      </table>
    </div>
  </div>

  <div class="col-sm-7">
    {{Form::open(['autocomplete' => 'off'])}}
      <div class="form-group">
        <h4>Add a group</h4>
        <select class="form-control" name="role_id">
          <?php 
            $_user_roles = [];
            foreach ($user_roles as $role) {
              $_user_roles[] = $role['name'];
            }
          ?>

          <option>--- Select ---</option>
          @foreach ($available_roles as $role)
            @if (in_array($role['name'], $_user_roles))
              <?php continue ?>
            @endif
            <option value="{{$role['id']}}">{{$role['name']}}</option>
          @endforeach
        </select>
      </div>

      <button class="btn btn-success pull-right" type="submit">Add</button>
    {{Form::close()}}
  </div>

</div>
@stop

@section('javascript')
<script type="text/javascript">
</script>
@stop