<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Student Directory')</title>

    <link
        href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet">

    <link
        href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}"
        rel="stylesheet">

    @stack('styles')
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul
            class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar">
            <a
                class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ url('/students') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>

                <div class="sidebar-brand-text mx-3">
                    Student Directory
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ request()->is('students') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/students') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Students</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('students/create') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/students/create') }}">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Add Student</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button
                    class="rounded-circle border-0"
                    id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button
                        id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Search -->
                    <form
                        action="{{ url('/students') }}"
                        method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input
                                type="text"
                                name="search"
                                class="form-control bg-light border-0 small"
                                placeholder="Search students..."
                                value="{{ request('search') }}">

                            <div class="input-group-append">
                                <button
                                    class="btn btn-primary"
                                    type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar right -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="userDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    Admin
                                </span>

                                <i class="fas fa-user-circle fa-2x text-gray-400"></i>
                            </a>

                            <div
                                class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('/students') }}">
                                    <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Students
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- End Page Content -->

            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>
                            Copyright &copy; {{ date('Y') }} Student Directory
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

        </div>
        <!-- End Content Wrapper -->

    </div>

    <!-- Scroll to Top -->
    <a
        class="scroll-to-top rounded"
        href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- JavaScript -->
    <script src="{{ asset('sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('sb-admin-2/js/sb-admin-2.min.js') }}"></script>

    @stack('scripts')
</body>

</html>