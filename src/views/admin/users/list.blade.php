@extends('admin-laravel::admin.layouts.panel')

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

  <a href="{{Config::get('admin-laravel::routes.admin.url')}}/user/add" class="btn btn-success"><i class="fa fa-1x fa-plus-circle"></i> Add New</a>
  <a href="#" id="pencilBtn" class="btn btn-primary disabled"><i class="fa fa-1x fa-pencil-square-o"></i> Edit</a>
  <a href="#" id="groupBtn" class="btn btn-danger disabled"><i class="fa fa-1x fa-group"></i> Manage Roles</a>
  <a href="#" id="resetPwdBtn" class="btn btn-default disabled" data-toggle="modal" data-target="#resetPwdModal"><i class="fa fa-1x fa-unlock"></i> Reset Password</a>
  <hr>
  
  <div class="col-sm-3">
      @include('admin-laravel::admin.tools.search_panel', [
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
        ],
      ])
  </div>

  <?php
    $order_reverse = ($searcher->getOrderBy() == 'asc') ? 'desc': 'asc';
    $current_url = URL::current();
  ?>
  <div class="col-sm-9">
    <div class="table-responsive">
      <table class="table table-bordered table-condensed">
        <tr>
          <th></th>
          <th><a href="{{$current_url . '?' . $searcher->parseUrl(['sort' => 'id', 'order' => $order_reverse])}}">User ID</a></th>
          <th><a href="{{$current_url . '?' . $searcher->parseUrl(['sort' => 'email', 'order' => $order_reverse])}}">Email</th>
          <th><a href="{{$current_url . '?' . $searcher->parseUrl(['sort' => 'last_name', 'order' => $order_reverse])}}">Last Name</th>
          <th><a href="{{$current_url . '?' . $searcher->parseUrl(['sort' => 'first_name', 'order' => $order_reverse])}}">First Name</th>
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
    </div>
    <div class="links">
      {{$users->appends(Input::all())->links()}}
    </div>
  </div>

<div class="">
  <!-- Modal -->
  <div class="modal fade" id="resetPwdModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Please confirm!</h4>
        </div>
        <div class="modal-body">
          Hi there, We need your confirmation to reset the password.
          <div style="margin-top:20px;display:none;" class="resetPwdResponseBox alert alert-info"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="resetConfirmBtn" data-loading-text="Loading..." class="btn btn-primary">Reset</button>
          <a class="" href="#" id="selected" data-role="button"></a>
        </div>
      </div>
    </div>
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
        $("#resetPwdBtn").removeClass("disabled");

        var user_id = $(".userCheckbox:checked").data('user');

        var url = "{{Config::get('admin-laravel::routes.admin.url')}}"+"/user/"+user_id+"/edit";
        $("#pencilBtn").attr("href", url);

        var url = "{{Config::get('admin-laravel::routes.admin.url')}}"+"/user/"+user_id+"/roles";
        $("#groupBtn").attr("href", url);

        $("#resetConfirmBtn").on('click', function() {
          var resetConfirmBtn = $(this);
          var oldTitle = $(this).text();

          $(this).addClass('disabled');
          $(this).text('Loading...');

          $.getJSON("{{Config::get('admin-laravel::routes.admin_user_reset_password.url')}}", {
            'id': user_id
          }).done(function(data) {
            resetConfirmBtn.removeClass('disabled');
            resetConfirmBtn.text(oldTitle);

            $('#resetPwdModal .resetPwdResponseBox').slideDown();
            $('#resetPwdModal .resetPwdResponseBox').html(data.message);

          }).fail(function() {
            console.log("Error getting the message from the server");
          });
        });

      } else {
        $("#pencilBtn").addClass("disabled");
        $("#groupBtn").addClass("disabled");
        $("#resetPwdBtn").addClass("disabled");
      }
    });
  });
</script>
@stop