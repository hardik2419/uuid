<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('backpack::inc.head')
</head>
<body class="hold-transition login-page">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper m-0 p-0">

        <!-- Content Header (Page header) -->
         @yield('header')

        <!-- Main content -->
        <section class="content login-box">

          @yield('content')

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer m-0 text-sm">
        @include('backpack::inc.footer')
      </footer>
   

    @yield('before_scripts')
    @stack('before_scripts')

    @include('backpack::inc.scripts')
    @include('backpack::inc.alerts')

    @yield('after_scripts')
    @stack('after_scripts')

    <!-- JavaScripts -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>
