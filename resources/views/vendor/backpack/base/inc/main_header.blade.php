<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
  <!-- Logo -->
  {{-- <a href="{{ url('') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">{!! config('backpack.base.logo_mini') !!}</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{!! config('backpack.base.logo_lg') !!}</span>
  </a> --}}
  <!-- Header Navbar: style can be found in header.less -->
  {{-- <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">{{ trans('backpack::base.toggle_navigation') }}</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    @include('backpack::inc.menu')
  </nav> --}}
  <ul class="navbar-nav ml-auto">
      {{-- <li><a href="{{ route('backpack.auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a></li> --}}
      <li class="nav-item">
        <a href="{{ route('backpack.auth.logout') }}"" class="nav-link" ><i class="fa fa-btn fa-sign-out"></i>{{ trans('backpack::base.logout') }}</a>
      </li>
    </ul>
</nav>