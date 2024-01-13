<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" type="image/jpg" href="/uploads/setting/{{setting('favicon')}}"/>

        <title>@yield('title')</title>
        @include('layouts.global')
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
        
        <!-- pace-progress -->
        {{-- <link rel="stylesheet" href="/assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css"> --}}
        
        @notifyCss

        @stack('css')

        <!-- Theme style -->
        <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
        <style>
            div.fixed.inset-0.flex.items-end.justify-center {z-index: 999999;}
        </style>
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <!-- Navbar -->
            @include('layouts.admin.partials.navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('layouts.admin.partials.aside')
            <!-- /.main sidebar container -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                @yield('content')
                
            </div>
            <!-- /.content-wrapper -->

            <!-- Footer -->
                <x-footer-component></x-footer-component>
            <!-- /.footer -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        
        <!-- pace-progress -->
        {{-- <script src="/assets/plugins/pace-progress/pace.min.js"></script> --}}

        <x:notify-messages />
        @notifyJs

        @stack('js')

        <script src="/assets/dist/js/demo.js"></script>
        <script>
            $(document).ready(function () {
                    setInterval(function () {
                   $('.notify').hide();
                }, 2000);
                function countNewMessage(){
                    $.ajax({
                        type: "GET",
                        url: "{{route('admin.connection.live.chat.new-sms.count')}}",
                        dataType: "JSON",
                        success: function (response) {
                            $('li#countMessage span').text(response)
                        }
                    });
                }

                setInterval(function () {
                    countNewMessage();
                }, 7000);
            });
            
        </script>
    </body>
</html>
