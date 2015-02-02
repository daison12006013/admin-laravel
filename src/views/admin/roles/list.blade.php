@extends('admin::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
@stop

@section('content_title')
@stop

@section('content')
  <a href="{{Config::get('admin::routes.admin.url')}}/role/add" class="btn btn-success"><i class="fa fa-1x fa-plus-circle"></i> Add New</a>
  <a href="#" id="pencilBtn" class="btn btn-primary disabled"><i class="fa fa-1x fa-pencil-square-o"></i> Edit</a>
  <hr>
  
  <table class="table table-bordered table-condensed">
    <tr>
      <th></th>
      <th>Name</th>
      <th>Member Counts</th>
    </tr>
  </table>
@stop

@section('javascript')
<script type="text/javascript">
  $(function() {

    $(".userCheckbox").attr("checked", false);

    $(".userCheckbox").click(function() {
      var userBoxCount = $(".userCheckbox:checked").length;
      if (userBoxCount == 1) {
        $("#pencilBtn").removeClass("disabled");
        $("#groupBtn").removeClass("disabled");

        var user_id = $(".userCheckbox:checked").data('user');

        var url = "{{Config::get('admin::routes.admin.url')}}"+"/user/"+user_id+"/edit";
        $("#pencilBtn").attr("href", url);

        var url = "{{Config::get('admin::routes.admin.url')}}"+"/user/"+user_id+"/roles";
        $("#groupBtn").attr("href", url);

      } else {
        $("#pencilBtn").addClass("disabled");
        $("#groupBtn").addClass("disabled");
      }
    });
  });
</script>
@stop