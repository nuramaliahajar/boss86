<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    @yield('title')
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/waves/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/chartist/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/datatables-bootstrap/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/datatables-fixedheader/dataTables.fixedHeader.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/datatables-responsive/dataTables.responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/bootstrap-treeview/bootstrap-treeview.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/jstree/jstree.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/vendor/c3/c3.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/css-dummy/tables/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/css-dummy/dashboard/v1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/css-dummy/forms/advanced.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/css-dummy/pages/login-v2.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('global/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/fonts/font-awesome/font-awesome.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

  <!--[if lt IE 9]>
    <script src="global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="global/vendor/media-match/media.match.min.js"></script>
    <script src="global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts 
	<script src="{{ asset('global/vendor/modernizr/modernizr.js') }}"></script>
	-->
    <script src="{{ asset('global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
    Breakpoints();
    </script>

    @yield('css')
</head>

<body>
    @include('layouts.module.header')

    <div class="site-menubar">
        @include('layouts.module.sidebar')
    </div>

    <div class="page animasition">
        @yield('content')
    </div>

    @include('layouts.module.footer')

    <!-- Core  -->
    <script src="{{ asset('global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('global/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('global/vendor/tether/tether.js') }}"></script>
    <script src="{{ asset('global/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('global/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ asset('global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ asset('global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
    <script src="{{ asset('global/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
    <script src="{{ asset('global/vendor/waves/waves.js') }}"></script>
    <script src="{{ asset('global/vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('global/vendor/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('global/vendor/intro-js/intro.js') }}"></script>
    <script src="{{ asset('global/vendor/screenfull/screenfull.js') }}"></script>
    <script src="{{ asset('global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
    <script src="{{ asset('global/vendor/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('global/vendor/matchheight/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('global/vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('global/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('global/vendor/datatables-fixedheader/dataTables.fixedHeader.js') }}"></script>
    <script src="{{ asset('global/vendor/datatables-bootstrap/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('global/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('global/vendor/datatables-buttons/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('global/vendor/bootstrap-treeview/bootstrap-treeview.min.js') }}"></script>
    <script src="{{ asset('global/vendor/jstree/jstree.min.js') }}"></script>
    <script src="{{ asset('global/vendor/d3/d3.min.js') }}"></script>
    <script src="{{ asset('global/vendor/c3/c3.min.js') }}"></script>

    <!-- Script -->
    <script src="{{ asset('global/js/State.js') }}"></script>
    <script src="{{ asset('global/js/Component.js') }}"></script>
    <script src="{{ asset('global/js/Plugin.js') }}"></script>
    <script src="{{ asset('global/js/Base.js') }}"></script>
    <script src="{{ asset('global/js/Config.js') }}"></script>
    <script src="{{ asset('assets/js/Section/Menubar.js') }}"></script>
    <script src="{{ asset('assets/js/Section/GridMenu.js') }}"></script>
    <script src="{{ asset('assets/js/Section/Sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/Section/PageAside.js') }}"></script>
    <script src="{{ asset('global/js/config/colors.js') }}"></script>
    <script src="{{ asset('assets/js/config/tour.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('global/js/Plugin/panel.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/Plugin/menu.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/select2.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/bootstrap-select.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/asscrollable.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/slidepanel.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/switchery.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/matchheight.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/peity.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/jstree.js') }}"></script>
    <script src="{{ asset('global/js/Plugin/material.js') }}"></script>
    <script>
        Config.set('assets', 'assets');
    </script>

    <!-- Function -->
    <script src="{{ asset('assets/js/Site.js') }}"></script>
    <script src="{{ asset('assets/js/js-dummy/charts/c3.js') }}"></script>
    <!--
		only dashboard page
		<script src="{{ asset('assets/js/custom.js') }}"></script>
	-->
    @yield('js')
</body>
</html>