<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css') }}"
        rel="stylesheet" />

    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('https://use.fontawesome.com/releases/v6.3.0/js/all.js') }}" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
       <a href="{{ route('posDetails.index')}}"  style="margin-left: 55%"> <button class="btn btn-primary"><i class="fas fa-plus"></i> Pos</button></a>


        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li> <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link mt-4 {{ (request()->is('dashboard*')) ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link {{ (request()->is('categories*')) ? 'active' : '' }}" href="{{ route('categories.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                            Category
                        </a>
                        <a class="nav-link {{ (request()->is('product*')) ? 'active' : '' }}" href="{{ route('product.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
                            Products
                        </a>
                        <a class="nav-link {{ (request()->is('orders_details*')) ? 'active' : '' }}" href="{{ route('orders_details.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Orders 
                        </a>
                  
                        <a class="nav-link {{ (request()->is('dailySales*')) ? 'active' : '' }}" href="{{ route('dailySales.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                            Daily Sales
                        </a>
                        <a class="nav-link {{ (request()->is('customer*')) ? 'active' : '' }}" href="{{ route('customer.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                            Customers
                        </a>
                        <a class="nav-link {{ (request()->is('bills*')) ? 'active' : '' }}" href="{{ route('bills.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                            Bills
                        </a>
                        <a class="nav-link {{ (request()->is('transactionCategory*')) ? 'active' : '' }}" href="{{ route('transactionCategory.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                            Transaction Category
                        </a>
                        <a class="nav-link {{ (request()->is('transactions*')) ? 'active' : '' }}" href="{{ route('transactions.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                            Transactions
                        </a>
                        <a class="nav-link {{ (request()->is('reports*')) ? 'active' : '' }}" href="{{ route('reports.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                            Reports
                        </a>
                        <a class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}" href="{{ route('user.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                            Users
                        </a>
                        
                        <a class="nav-link {{ (request()->is('quotations')) ? 'active' : '' }}" href="{{ route('quotations.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
                            Quotation Products
                        </a>
                        <a class="nav-link{{ (request()->is('paymentsystem*')) ? ' active' : '' }}" href="{{ route('paymentsystem.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                            Payment
                        </a>
                        

            </nav>
        </div>
  
        @yield('content')

    </div>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('assets/js/simple-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>

</body>

</html>
