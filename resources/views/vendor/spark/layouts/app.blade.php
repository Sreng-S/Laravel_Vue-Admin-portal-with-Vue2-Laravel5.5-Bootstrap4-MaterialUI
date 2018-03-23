<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    {{--<link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}

    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/assets/plugins/custombox/css/custombox.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    {{--<link href="/assets/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />--}}
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/assets/js/modernizr.min.js"></script>

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body class="with-navbar fixed-left">
<!-- Loader -->
{{--<div id="preloader">--}}
    {{--<div id="status">--}}
        {{--<div class="spinner">--}}
            {{--<div class="spinner-wrapper">--}}
                {{--<div class="rotator">--}}
                    {{--<div class="inner-spin"></div>--}}
                    {{--<div class="inner-spin"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- Begin page -->
<div id="wrapper">
    <div id="spark-app" v-cloak>
        @if (Auth::check())
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="ti-dashboard"></i><span class="title">Dashboard</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="ti-user"></i>
                                    <span class="title"><span class="label label-info">0</span> Contacts</span>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="ti-layout-media-overlay-alt-2"></i>
                                    <span class="title"><span class="label label-danger">0</span> Sales & Invoices</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li class="">
                                        <a href="#"><span class="label label-danger">0</span> Invoices</a>
                                    </li>
                                    <li class="">
                                        <a href="#">Create Invoice</a>
                                    </li>
                                    <li class="">
                                        <a href="#"><span class="label label-warning">0</span> Payments</a>
                                    </li>
                                    <li class="">
                                        <a href="#"><span class="label label-success">0</span> Recurring Invoices</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="ti-write"></i>
                                    <span class="title"><span class="label label-info" style="background-color: #34d3eb;">0</span> Quotations</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#"><span class="label label-info" style="background-color: #34d3eb;">0</span> Quotations</a>
                                    </li>
                                    <li>
                                        <a href="#">Create Quotation</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="ti-truck"></i>
                                    <span class="title"><span class="label label-success">0</span> Products & Services</span>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="ti-wallet"></i>
                                    <span class="title">Accounting</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li class="">
                                        <a href="#">Transactions</a>
                                    </li>
                                    <li class="">
                                        <a href="#">Chart of Accounts</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="ti-pulse"></i>
                                    <span class="title">Reports</span>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="ti-settings"></i>
                                    <span class="title">Configuration</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li class="">
                                        <a href="#">Payment Gateway</a>
                                    </li>
                                    <li class="">
                                        <a href="#">Configuration</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <!-- Navigation -->
        @if (Auth::check())
            @include('spark::nav.user')
        @endif
        <!-- Main Content -->
            @yield('content')
        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif
    </div>
</div>

    <script>
        var resizefunc = [];
    </script>

<!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/sweetalert.min.js"></script>

    <!-- jQuery  -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
    <script src="/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/detect.js"></script>
    <script src="/assets/js/fastclick.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>
    <script src="/assets/js/jquery.blockUI.js"></script>
    <script src="/assets/js/waves.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/jquery.nicescroll.js"></script>
    <script src="/assets/js/jquery.scrollTo.min.js"></script>
    <!-- Modal-Effect -->
    <script src="/assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="/assets/plugins/custombox/js/legacy.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/jquery.core.js"></script>
    <script src="/assets/js/jquery.app.js"></script>
</body>
</html>
