
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AdminLTE 3 | Starter</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.home') }}">
            {{ config('app.name', 'Laravel') }} {{ ucfirst(config('multiauth.prefix')) }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item ">
                <a class="nav-link pr-3" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link" href="/product">All Product</a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link" href="/show_items/electro">Electric</a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link" href="/show_items/home_app">Home app</a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link" href="/show_items/computing">Computers</a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link" href="/show_items/fashion">Fashions</a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link" href="/show_items/others">othres</a>
              </li>
              <li class="nav-item pr-3">
                  <a class="nav-link" href="/Hired-product">Hired items</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix'))
                        }} Login</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ auth('admin')->user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @admin('super')
                        <a class="dropdown-item" href="{{ route('admin.show') }}">{{
                            ucfirst(config('multiauth.prefix')) }}</a>
                        @permitToParent('Role')
                        <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                        @endpermitToParent
                        @endadmin
                        <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                        <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#511540">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sl Choice</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">{{ auth('admin')->user()->name }} </a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <router-link to="/dashboar" class="nav-link">
              <i class="nav-icon fas fa-th text-blue"></i>
              <p>
                Dashboard
                
              </p>
            </router-link>
          </li> 
          <li class="nav-item">
            <router-link to="/catagory" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Catagory
                
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/orders" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Orders 
              </p>
            </router-link>
          </li>   
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <router-view></router-view>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
