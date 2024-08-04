
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin/assets')}}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title')</title>
    <meta name="description" content="admin"/>
    <!-- Favicon -->
    @include('admin.layouts.header')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                @include('admin.layouts.sidebar')
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    @include('admin.layouts.navbar')
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                      @yield('content')
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- / Layout wrapper -->
    @include('admin.layouts.footer')
    @stack('script')
</body>

</html>
