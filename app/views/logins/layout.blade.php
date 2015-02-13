<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>
        @section('title')
            HelpDesk |
        @show
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="HelpDesk a.k.a CRM" name="description"/>
    <meta content="KecambahLinux" name="author"/>
    @section('style')
        {{HTML::style('template/assets/bootstrap/css/bootstrap.min.css')}}
        {{HTML::style('template/assets/bootstrap/css/bootstrap-responsive.min.css')}}
        {{HTML::style('template/assets/font-awesome/css/font-awesome.css')}}
        {{HTML::style('template/css/style.css')}}
        {{HTML::style('template/css/style-responsive.css')}}
        {{HTML::style('template/css/style-default.css',array('id'=>'style_color'))}}
    @show
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
<div class="lock-header">
    <!-- BEGIN LOGO -->
    <a class="center" id="logo" href="index.html">
        {{HTML::image('template/img/logohelpdesk.png', 'logo', array('class'=>'center'))}}
    </a>
    <!-- END LOGO -->
</div>
<div class="login-wrap">
    @yield('content')
</div>
</body>
<!-- END BODY -->
@section('script')
    {{HTML::script('template/js/jquery-1.8.3.min.js')}}
@show
</html>