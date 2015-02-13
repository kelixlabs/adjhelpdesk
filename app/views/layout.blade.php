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
        {{HTML::style('template/assets/bootstrap/css/bootstrap-fileupload.css')}}
        {{HTML::style('template/assets/font-awesome/css/font-awesome.css')}}
        {{HTML::style('template/css/style.css')}}
        {{HTML::style('template/css/style-responsive.css')}}
        {{HTML::style('template/css/style-default.css',array('id'=>'style_color'))}}
        {{HTML::style('template/assets/fancybox/source/jquery.fancybox.css')}}
        {{HTML::style('template/assets/uniform/css/uniform.default.css')}}
    @show
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<!-- BEGIN HEADER -->
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!--BEGIN SIDEBAR TOGGLE-->
            <div class="sidebar-toggle-box hidden-phone">
                <div class="icon-reorder"></div>
            </div>
            <!--END SIDEBAR TOGGLE-->
            <!-- BEGIN LOGO -->
            <a class="brand" href="{{URL::to('/')}}">
                {{HTML::image('template/img/logohelpdesk.png', 'Kholid Inc.')}}
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse"
               data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="arrow"></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <div id="top_menu" class="nav notify-row">
                @include('menus.topmenu')
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
    @include('menus.sidemenu')
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        @yield('pageTitle')
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            {{--Request::segment(1, '/')--}}
                            <a href="{{URL::to('/')}}">Beranda</a>
                        </li>
                        <?php $uri = '/'; ?>
                        @foreach(Request::segments() as $segmen)
                            <?php $uri .= $segmen . '/'; ?>
                            <li>
                                <span class="divider">/</span>
                                {{HTML::link($uri, $segmen)}}
                            </li>
                        @endforeach
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN CONTENT-->
            @yield('content')
            <!-- END CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div id="footer">
    2014 &copy; HELPDESK-CRM | JONERO Corp.&reg;
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
{{HTML::script('template/js/jquery-1.8.3.min.js')}}
{{HTML::script('template/js/jquery.nicescroll.js')}}
{{HTML::script('template/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js')}}
{{HTML::script('template/assets/jquery-slimscroll/jquery.slimscroll.min.js')}}
{{HTML::script('template/assets/bootstrap/js/bootstrap.min.js')}}
@yield('bootstrapScript')
{{HTML::script('template/js/jquery.blockui.js')}}
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->
{{HTML::script('template/assets/uniform/jquery.uniform.min.js')}}
@yield('componentScript')

<!--common script for all pages-->
{{HTML::script('template/js/common-scripts.js')}}

<!--script for this page only-->
@yield('pageScript')
<!--end script-->

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>