<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Welcome to {{Config::get('admin-laravel::general.site_name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="/packages/daison/admin-laravel/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/packages/daison/admin-laravel/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/packages/daison/admin-laravel/css/style.css" rel="stylesheet">
    <link href="/packages/daison/admin-laravel/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

    @yield('css_internal')
  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

    <div id="login-page">
      <div class="container">

          {{Form::open(['url' => Config::get('admin-laravel::routes.admin_security_login.url'), 'method' => 'POST', 'class' => 'form-login'])}}
            <h2 class="form-login-heading">sign in now</h2>
            <div class="login-wrap">
                @if (Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if (Session::has('error'))
                  <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <input type="email" name="email" class="form-control" placeholder="Email" autofocus>
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <label class="checkbox">
                    <span class="pull-right">
                        <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
    
                    </span>
                </label>
                <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
            </div>
    
              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Forgot Password ?</h4>
                          </div>
                          <div class="modal-body">
                              <div style="display:none;" class="resetPwdResponseBox alert alert-info">

                              </div>
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email_for_fp" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button id="resetConfirmBtn" class="btn btn-theme" type="button">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->

          {{Form::close()}}     
      
      </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/packages/daison/admin-laravel/js/jquery.js"></script>
    <script src="/packages/daison/admin-laravel/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/packages/daison/admin-laravel/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/packages/daison/admin-laravel/img/login-bg.jpg", {speed: 500});
    </script>

    <script type="text/javascript">
      $(function() {
        $("#resetConfirmBtn").on('click', function() {
          var resetConfirmBtn = $(this);
          var oldTitle = $(this).text();

          $(this).addClass('disabled');
          $(this).text('Loading...');

          var email = $('input[name="email_for_fp"]').val();
          $.getJSON("{{Config::get('admin-laravel::routes.admin_user_forgot_password.url')}}", {
            'email': email
          }).done(function(data) {
            resetConfirmBtn.removeClass('disabled');
            resetConfirmBtn.text(oldTitle);

            $('.resetPwdResponseBox').slideDown();
            $('.resetPwdResponseBox').html(data.message);

          }).fail(function() {
            console.log("Error getting the message from the server");
          });
        });
      });
    </script>

  </body>
</html>
