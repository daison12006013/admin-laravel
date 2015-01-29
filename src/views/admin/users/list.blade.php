@extends('admin::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
@stop

@section('content_title')
@stop

@section('content')
  <a href="" class="btn btn-success"><i class="fa fa-1x fa-plus-circle"></i> Add New</a>
  <a href="" id="pencilBtn" class="btn btn-primary disabled"><i class="fa fa-1x fa-pencil-square-o"></i> Edit</a>
  <hr>
  
  <table class="table table-bordered table-condensed">
    <tr>
      <th></th>
      <th>User ID</th>
      <th>Email</th>
      <th>Last Name</th>
      <th>First Name</th>
    </tr>
    @foreach ($users as $user)
      <tr>
        <td style="width:1px;" class="col-sm-1">
          <input type="checkbox" class="userCheckbox" data-user="{{$user['id']}}">
        </td>
        <td>{{$user['id']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['last_name']}}</td>
        <td>{{$user['first_name']}}</td>
      </tr>    
    @endforeach
  </table>
@stop

@section('javascript')
<script type="text/javascript">
  $(function() {
    $(".userCheckbox").click(function() {
      var userBoxCount = $(".userCheckbox:checked").length;
      if (userBoxCount == 1) {
        $("#pencilBtn").removeClass("disabled");
        $("#pencilBtn").attr("href", "{{Config::get('admin::routes.admin_user_add.url')}}");
      } else {
        $("#pencilBtn").addClass("disabled");
      }
    });
  });
</script>
@stop