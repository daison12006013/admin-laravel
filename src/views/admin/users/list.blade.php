@extends('admin::admin.layouts.panel')

@section('title')
@stop

@section('css_internal')
<style type="text/css">
  .links {
    text-align: center;
  }
</style>
@stop

@section('content_title')
@stop

@section('content')

  <a href="{{Config::get('admin::routes.admin.url')}}/user/add" class="btn btn-success"><i class="fa fa-1x fa-plus-circle"></i> Add New</a>
  <a href="#" id="pencilBtn" class="btn btn-primary disabled"><i class="fa fa-1x fa-pencil-square-o"></i> Edit</a>
  <a href="#" id="groupBtn" class="btn btn-danger disabled"><i class="fa fa-1x fa-group"></i> Manage Roles</a>
  <a href="#" id="resetPwdBtn" class="btn btn-default disabled"><i class="fa fa-1x fa-group"></i> Reset Password</a>
  <hr>
  
  <div class="col-sm-3">
    <div class="well">
      @include('admin::admin.layouts.search_panel', [
        'forms' => 
        [
          [
            'label' => 'User ID',
            'name'  => 'search[id]',
            'type'  => 'text',
            'html'  => [
              'class' => 'form-control input-sm',
            ],
          ],
          [
            'label' => 'Email',
            'name'  => 'search[email]',
            'type'  => 'text',
            'html'  => [
              'class' => 'form-control input-sm',
            ],
          ],
          [
            'label' => 'First Name',
            'name'  => 'search[first_name]',
            'type'  => 'text',
            'html'  => [
              'class' => 'form-control input-sm',
            ],
          ],
          [
            'label' => 'Last Name',
            'name'  => 'search[last_name]',
            'type'  => 'text',
            'html'  => [
              'class' => 'form-control input-sm',
            ],
          ],
          // [
          //   'label' => 'Sample',
          //   'name'  => 'search[sample]',
          //   'type'  => 'select',
          //   'options' => [
          //     'test' => 'Test',
          //   ],
          //   'html'  => [
          //     'class' => 'form-control input-sm',
          //   ],
          // ],
        ],
      ])
    </div>
  </div>

  <div class="col-sm-9">
    <div class="links">
      {{$users->addQuery('sort', $sort)->addQuery('order', $order_by)->links()}}
    </div>
    <table class="table table-bordered table-condensed">
      <?php
        $order_by_reverse = ($order_by === 'asc') ? 'desc' : 'asc';

        $current_url = URL::current();
        echo $current_url;
        $current_page = '&page=' . $users->getCurrentPage();
      ?>
      <tr>
        <th></th>
        <th><a href="{{$current_url . '?sort=id&order='          . $order_by_reverse  . $current_page}}">User ID</a></th>
        <th><a href="{{$current_url . '?sort=email&order='       . $order_by_reverse  . $current_page}}">Email</th>
        <th><a href="{{$current_url . '?sort=last_name&order='   . $order_by_reverse  . $current_page}}">Last Name</th>
        <th><a href="{{$current_url . '?sort=first_name&order='  . $order_by_reverse  . $current_page}}">First Name</th>
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
    <div class="links">
      {{$users->addQuery('sort', $sort)->addQuery('order', $order_by)->links()}}
    </div>
  </div>
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