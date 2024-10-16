<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.partials.header')

<body>
<div class="wrapper">
    <!-- Sidebar -->
    @include('layouts.admin.partials.sidebar')
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('assets/img/kaiadmin/logo_appli-bonus.jpg') }}" alt="LWP Light World Promotion Logo" class="img-fluid">

                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <!-- Navbar Header -->
            @include('layouts.admin.partials.nav')
            <!-- End Navbar -->
        </div>

        <div class="container table-responsive" >
            @yield('content')
        </div>

        @include('layouts.admin.partials.footer')
    </div>
</div>
<!--   Core JS Files   -->
@include('layouts.admin.partials.script')

@include('sweetalert::alert')


</body>

</html>
