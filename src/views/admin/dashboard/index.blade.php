@extends('admin::admin.layouts.panel')

@section('title')
  Homepage - {{Config::get('admin::general.site_name')}}
@stop

@section('content_title')
  Home
@stop

@section('content')
  This is your homepage.<br/>
  Modify your dashboard index, by changing the <b>/app/config/packages/daison/admin/config/general.php</b>
@stop