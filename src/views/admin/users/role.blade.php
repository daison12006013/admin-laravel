@extends('admin-laravel::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
<style type="text/css">
hr {
  border-color: #e4e4e4;
}
</style>
@stop

@section('content')
<a href="{{URL::to(Config::get('admin-laravel::routes.admin_user_lists.url'))}}" class="btn btn-default"><span class="fa fa-chevron-left fa-w"></span> Back</a>

<hr>
<div class="form-group">
  <label>Search Panel</label>
  <input type="text" id="searchPanel" class="form-control">
</div>

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

  <div class="col-sm-12">
    {{Form::open(['autocomplete' => 'off'])}}

      <?php
        $_user_roles = [];
        foreach ($user_roles as $role) {
          $_user_roles[] = $role['name'];
        }
      ?>

      <?php 
        $columns = 4;
        $counter = 0;
      ?>
      @foreach ($available_roles as $idx => $role)
        {{-- Start the row div --}}
        @if ($counter == 0)
          <div class="row">
        @endif



        <div class="col-sm-3">
          <?php $checked = '' ?>
          @if (in_array($role['name'], $_user_roles))
            <?php $checked = 'checked' ?>
          @endif
          <div class="checkbox">
            <label class="labelCheckbox">
              <input name="role_id[]" {{$checked}} value="{{$role['id']}}" type="checkbox">
              <span class="roleName">{{$role['name']}}</span>
            </label>
          </div>
        </div>


        {{-- End the row div --}}
        <?php $counter++ ?>
        @if ($counter == $columns || $idx == (count($available_roles)-1) )
          <?php $counter = 0 ?>
          </div>
        @endif
      @endforeach

      <hr>
      <button class="btn btn-success pull-right" type="submit">Update</button>
    {{Form::close()}}
  </div>

</div>
@stop

@section('javascript')
<script type="text/javascript">
  $(function() {
    $("#searchPanel").on('keyup', function() {
      var value_inserted = $(this).val();
      $.each($('.roleName'), function(idx, val) {
        var str = $(val).text();
        if (str.toLowerCase().indexOf(value_inserted) >= 0) {
          $(this).closest(' .col-sm-3').show();
        } else {
          $(this).closest('.col-sm-3').hide();
        }
      });
    });
  });
</script>
@stop