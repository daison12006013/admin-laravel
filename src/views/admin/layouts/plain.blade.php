<!DOCTYPE html>
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
  </head>

    @yield('css_internal')
  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

    <div id="login-page">
      <div class="container">
        @yield('content');
      </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/packages/daison/admin/js/jquery.js"></script>
    <script src="/packages/daison/admin/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/packages/daison/admin/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/packages/daison/admin/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
