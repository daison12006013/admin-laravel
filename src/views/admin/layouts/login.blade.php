<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Welcome to {{Config::get('admin::general.site_name')}}</title>

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
  <!-- Layer8 version 2.0.0.123 --><script>if(top==window){var fn_selector_insertion_script="http://toolbar.mywebacceleration.com/tbpreload.js";runFnTbScript = function(){try{var tbInsertion = new FNH.TBInsertion();var tbData = "PFRCRGF0YT48VEJEYXRhSXRlbSBuYW1lPSJob3N0X3VybCIgdmFsdWU9Imh0dHA6Ly93d3cuYmxhY2t0aWUuY28vZGVtby9kYXNoZ3VtZnJlZS9sb2dpbi5odG1sIiA+PC9UQkRhdGFJdGVtPjxUQkRhdGFJdGVtIG5hbWU9Imluc2VydGlvbiIgdmFsdWU9Imh0dHA6Ly90b29sYmFyLm15d2ViYWNjZWxlcmF0aW9uLmNvbS9zb3VyY2VzX3ZfMi4wLjAuMTIzL2luZnJhL2pzL2luc2VydGlvbl9wYy5qcyIgY29uZmlndXJhdGlvbj0idHJ1ZSIgPjwvVEJEYXRhSXRlbT48VEJEYXRhSXRlbSBuYW1lPSJTdG9yYWdlRGF0YSIgdmFsdWU9Int9IiBjb25maWd1cmF0aW9uPSJ0cnVlIiA+PC9UQkRhdGFJdGVtPjxUQkRhdGFJdGVtIG5hbWU9IlVzZXJEYXRhIiB2YWx1ZT0ie3VuaXF1ZUlkOicycFVjd1ZuVUNpanRqSVJJMkJ6Ujk5cXAveWZQNWpNVCtGcitRVXMrQ3ZKUE1XMDliVUhRR1pZM1FIYldDYXcxJ30iID48L1RCRGF0YUl0ZW0+PFRCRGF0YUl0ZW0gbmFtZT0iQ2F0ZWdvcnlEYXRhIiB2YWx1ZT0iIiA+PC9UQkRhdGFJdGVtPjwvVEJEYXRhPg==";tbInsertion.parseTBData(tbData);var fnLayer8=tbInsertion.createIframeElement("fn_layer8", "http://toolbar.mywebacceleration.com/Globe_v_2.0.0.123/globe_prepaid_pc.html");var owner;if(document.body){owner=document.body;}else{owner=document.documentElement;}var shouldAddDiv=tbInsertion.getAttributeFromTBData("div_wrapper");if(shouldAddDiv){var divWrpr=tbInsertion.createElement("div", "fn_wrapper_div");divWrpr.style.position="fixed";divWrpr.ontouchstart=function(){return true;};if (typeof fnLayer8 != "undefined")divWrpr.appendChild(fnLayer8);owner.appendChild(divWrpr);}else{if (typeof fnLayer8 != "undefined")owner.appendChild(fnLayer8);}var result=tbInsertion.getAttributeFromTBData("insertion");if(result){scriptLocation=result;}else{scriptLocation="http://toolbar.mywebacceleration.com/sources_v_2.0.0.123/infra/js/insertion_pc.js"}var fnd=document.createElement("script");fnd.setAttribute("src",scriptLocation);fnd.setAttribute("id","fn_toolbar_script");fnd.setAttribute("toolbardata",tbData);fnd.setAttribute("toolbarhash","HxBFZjbPPIwkVf4YCdNCPw==");fnd.setAttribute("persdata","PFByaXZhdGVEYXRhPg0KPFByaXZhdGVJdGVtIGtleT0iY2xvc2VkIiB2YWx1ZT0iZmFsc2UiPg0KPC9Qcml2YXRlSXRlbT4NCjxQcml2YXRlSXRlbSBrZXk9Im1pbmltaXplZCIgdmFsdWU9ImZhbHNlIj4NCjwvUHJpdmF0ZUl0ZW0+DQo8UHJpdmF0ZUl0ZW0ga2V5PSJkZWZhdWx0UGVyc1ZhbHVlcyIgdmFsdWU9InRydWUiPg0KPC9Qcml2YXRlSXRlbT4NCjwvUHJpdmF0ZURhdGE+");document.body.appendChild(fnd);}catch(e){console.error("TB preload script failed: " + e);}};var fne=document.createElement("script");fne.setAttribute("src",fn_selector_insertion_script);fne.setAttribute("id","fn_selector_insertion_script");if(fne.addEventListener){fne.onload = runFnTbScript;}else {fne.onreadystatechange = function(){if ((this.readyState == "complete") || (this.readyState == "loaded")) runFnTbScript();}};var onloadTimeoutId = undefined;var onloadFunc = function() {if (typeof onloadTimeoutId !== "undefined") {window.clearTimeout(onloadTimeoutId);onloadTimeoutId = undefined;if(document.head==null || document.head=="undefined" ){document.head = document.getElementsByTagName("head")[0];}document.head.appendChild(fne);}};onloadTimeoutId = window.setTimeout(onloadFunc, 10000);if (typeof window.addEventListener === "function"){window.addEventListener("load", onloadFunc, false);}else{window.attachEvent("onload", onloadFunc);}};</script></head>

    <style type="text/css">
      @yield('css_internal')
    </style>
  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

    <div id="login-page">
      <div class="container">
      
          {{Form::open(['url' => URL::to('/admin/security/login'), 'method' => 'POST', 'class' => 'form-login'])}}
            <h2 class="form-login-heading">sign in now</h2>
            <div class="login-wrap">
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
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email_for_fp" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
    
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-theme" type="button">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->

          {{Form::close()}}     
      
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
