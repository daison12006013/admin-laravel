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
      <th>Assigned Count</th>
    </tr>
    @foreach ($records as $id => $rec)
      <tr>
        <td style="width:1px;" class="col-sm-1">
          <input type="checkbox" class="roleCheckbox" data-role="{{$id}}">
        </td>
        <td>{{$rec['name']}}</td>
        <td>{{$rec['count']}}</td>
      </tr>
    @endforeach
  </table>
@stop

@section('javascript')
<script type="text/javascript">
  $(function() {

    $(".roleCheckbox").attr("checked", false);

    $(".roleCheckbox").click(function() {
      var userBoxCount = $(".roleCheckbox:checked").length;
      if (userBoxCount == 1) {
        $("#pencilBtn").removeClass("disabled");
        $("#groupBtn").removeClass("disabled");

        var user_id = $(".roleCheckbox:checked").data('role');

        var url = "{{Config::get('admin::routes.admin.url')}}"+"/role/"+user_id+"/edit";
        $("#pencilBtn").attr("href", url);

      } else {
        $("#pencilBtn").addClass("disabled");
        $("#groupBtn").addClass("disabled");
      }
    });
  });
</script>
@stop