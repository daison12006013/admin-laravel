<?php
  $user = Auth::user('user.first_name');
  $current_url = URL::to(Route::getCurrentRoute()->getPath());
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/packages/daison/admin/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/packages/daison/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/packages/daison/admin/css/style.css" rel="stylesheet">
    <link href="/packages/daison/admin/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('css_internal')
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{Config::get('admin::general.homepage_url')}}" class="logo"><b>{{Config::get('admin::general.site_name')}}</b></a>
            <!--logo end-->

            @if (Config::get('admin::general.enable_top_nav'))
              @include(Config::get('admin::general.top_nav_template'))
            @endif


            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                <li><a class="logout" href="{{Config::get('admin::routes.admin_security_logout.url')}}">Logout <i class="fa fa-sign-out fw"></i></a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <h5 class="centered">{{$user['first_name']}} {{$user['last_name']}}</h5>

                  @foreach (Config::get('admin::navigation') as $first_level => $val)

                      <?php 
                        if (isset($val['roles']) && count($val['roles']) > 0) {
                          $has_access = false;
                          foreach (Session::get('roles') as $role) {
                            if (in_array($role['name'], $val['roles'])) {
                              $has_access = true;
                              break;
                            }
                          }

                          if (!$has_access) {
                            continue;
                          }
                        }
                      ?>

                      <li class="sub-menu">
                        <?php

                          $active = '';
                          if (isset($val['active']) && $val['active'] == true) {
                              $active = 'active';
                          }

                          $has_first_level = false;
                          if (isset($val['items']) && count($val['items']) > 0) {
                              $has_first_level = true;
                              $val['url'] = '#'; // make this url useless
                          }
                        ?>

                          <a data-url="{{@URL::to($val['url'])}}" class="parentLink {{$active}}" href="{{@$val['url']}}" >
                              <i class="{{@$val['icon']}}"></i>
                              <span>{{@$val['name']}}</span>
                          </a>
                          @if ($has_first_level)
                              <ul class="sub">
                                  @foreach ($val['items'] as $key => $second_val)

                                    <?php

                                      if (isset($second_val['roles']) && count($second_val['roles']) > 0) {
                                        $has_access = false;
                                        foreach (Session::get('roles') as $role) {
                                          if (in_array($role['name'], $second_val['roles'])) {
                                            $has_access = true;
                                            break;
                                          }
                                        }

                                        if (!$has_access) {
                                          continue;
                                        }
                                      }
                                    ?>


                                    <?php
                                      $second_active = '';
                                      if (isset($second_val['active']) && $second_val['active'] == true) {
                                        $second_active = 'active';
                                      }
                                    ?>
                                  <li data-url="{{@URL::to($second_val['url'])}}" class="{{$second_active}}">
                                      <a href="{{@$second_val['url']}}"><i class="{{@$second_val['icon']}}"></i>{{@$second_val['name']}}</a>
                                  </li>
                                  @endforeach
                              </ul>
                          @endif
                      </li>

                  @endforeach

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3>@yield('content_title')</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <p>@yield('content')</p>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/packages/daison/admin/js/jquery.js"></script>
    <script src="/packages/daison/admin/js/bootstrap.min.js"></script>
    <script src="/packages/daison/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/packages/daison/admin/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="/packages/daison/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/packages/daison/admin/js/jquery.scrollTo.min.js"></script>
    <script src="/packages/daison/admin/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="/packages/daison/admin/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          var currentUrl = "<?php echo trim($current_url, '/') ?>";
          $("li [data-url=\""+currentUrl+"\"]").addClass('active').closest('.sub-menu').find('.parentLink').click();
      });

  </script>

  @yield('javascript')

  </body>
</html>
