<html style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: sans-serif;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;font-size: 62.5%;-webkit-tap-highlight-color: rgba(0,0,0,0);">
<head style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
  <title style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">Password Reset</title>
  <style type="text/css" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
    td {
      border: 0 !important;
      padding: 15px 0 !important;
    }
  </style>
</head>
<body style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin: 0;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 14px;line-height: 1.42857143;color: #333;background-color: #fff;">
  <div class="container-fluid" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-right: auto;margin-left: auto;padding-left: 15px;padding-right: 15px;">
    <table class="table" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border-collapse: collapse!important;border-spacing: 0;max-width: 100%;background-color: transparent;width: 100%;margin-bottom: 20px;">
      <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
        <td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 15px 0 !important;border: 0 !important;background-color: #fff!important;">Dear {{$user['first_name']}},</td>
      </tr>
      <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
        <td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 15px 0 !important;border: 0 !important;background-color: #fff!important;">
          We received a request to change your password.<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
          Click the link below to set a new password.<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
        </td>
      </tr>
      <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;"><?php
          $url = parse_text(URL::to(Config::get('admin::routes.admin_resetpassword.url')), ['token' => $password_token]);
        ?><td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 15px 0 !important;border: 0 !important;background-color: #fff!important;">
          <a href="{{$url}}" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;background: 0 0;color: #428bca;text-decoration: underline;">{{$url}}</a>
        </td>
      </tr>
      <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
        <td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 15px 0 !important;border: 0 !important;background-color: #fff!important;">If you don't want to change your password, you can ignore this email.</td>
      </tr>
      <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
        <td style="font-size: 12px;font-style: italic;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 15px 0 !important;border: 0 !important;background-color: #fff!important;">
          <hr style="-webkit-box-sizing: border-box;-moz-box-sizing: content-box;box-sizing: content-box;height: 0;margin-top: 20px;margin-bottom: 20px;border: 0;border-top: 1px solid #eee;">
          This is an automated message, please do not reply.<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
          - {{Config::get('admin::general.site_name')}}
        </td>
      </tr>
    </table>
  </div>
</body>
</html>