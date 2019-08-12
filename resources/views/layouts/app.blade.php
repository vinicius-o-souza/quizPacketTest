<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap v4.1.1 -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

    <!-- Datetimepicker v4.17.47 -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.css') }}">

    <!-- CoreUI v2.1.9 -->
    <link rel="stylesheet" href="{{ asset('/css/coreui.min.css') }}">

    <!-- CoreUI Datatable Fix v1.0 -->
    <link rel="stylesheet" href="{{ asset('/css/coreui-datatable-fix.css') }}">

    <!-- CoreUI Icons v0.3.0 -->
    <link rel="stylesheet" href="{{ asset('/css/coreui-icons.min.css') }}">

    <!-- Font Awesome Free v5.8.1  -->
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.css') }}">

    <!-- Simple Line Icons v2.4.0 -->
    <link rel="stylesheet" href="{{ asset('/css/simple-line-icons.css') }}">

    <!-- Flag Icon v3.3.0 -->
    <link rel="stylesheet" href="{{ asset('/css/flag-icon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/dataTables.fontAwesome.css') }}">

    <!-- Select2 v4.0.7 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />

    <style>
        .select2 {
            width: 100%!important;
        }
        .highcharts-credits {
            display:none;
        }
    </style>

    @yield('styles')

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="app-body">
        @include('layouts.sidebar')
        <main class="main">
            @yield('content')
        </main>
    </div>

    <footer class="app-footer">
        <div>
            <span>Copyright &copy;</span>
            <a href="https://www.pandoapps.com">PandoApps </a>
        </div>
    </footer>

    </body>



    <!-- jQuery 3.1.1 -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <!-- Popper v1.12.9 -->
    <script src="{{ asset('/js/popper.min.js') }}"></script>

    <!-- Bootstrap v.4.1.1 -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <!-- Moment v2.20.1 -->
    <script src="{{ asset('/js/moment.min.js') }}"></script>

    <!-- Datetimepicker v4.17.37 -->
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- CoreUI v2.1.9 -->
    <script src="{{ asset('/js/coreui.min.js') }}"></script>

    <!-- Select2 v4.0.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <!-- Custom Scripts -->
    @yield('scripts')

    @stack('extra-scripts')

    @stack('highcharts-scripts')

    <script>
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $('.select2').select2({
            language: {
                noResults: function() {
                    return "Nenhum resultado encontrado";
                }
            }
        });
        $('.nav-item.active').find('.nav-link').addClass('active');
    </script>
</html>
