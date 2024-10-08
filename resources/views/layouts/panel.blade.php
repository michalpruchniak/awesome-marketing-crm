<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if(isset($mainTitle)) {{$mainTitle}} @else Awesome CRM @endif</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    @if (Route::has('login'))
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa-solid fa-circle-user"></i> {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
          <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Logout
                </h3>
              </div>
            </div>
          </a>
        </form>
          <div class="dropdown-divider"></div>
      </li>
    </ul>
    @endif
  </nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <p style="color: #FFF;">Awesome Marketing CRM</p>

    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item menu-is-opening">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Customers <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                @can('add user to customer')
                <li class="nav-item">
                    <a href="{{ route('customers.create') }}" class="nav-link">
                        <p>Create</p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('customers.list') }}" class="nav-link">
                        <p>List</p>
                    </a>
                </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper px-4 py-2" style="min-height: 529px;">
<div class="content-header">
    @if(isset($headerTitle)) <h1>{{$headerTitle}} @endif</h1>
</div>
<div class="content">
    @yield('content')
</div>
  </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    @yield('scripts')
</body>
</html>
