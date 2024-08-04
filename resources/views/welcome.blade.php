<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin/assets') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login</title>
    <meta name="description" content="" />
    @include('admin.layouts.header')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/page-auth.css') }}" />

    <style>
        .invalid-feedback {
            display: block !important;
            font-size: 10px;
        }

        .toast-success {
            background-color: #51a351 !important;
        }

        .toast-error {
            background-color: #bd362f !important;
        }
    </style>
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">[Project Name]</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <div class="mb-4">
                            <h5>Admin Panel</h5>
                            <p>This is the admin panel where you can manage users, settings, and more.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary d-grid w-100 mb-3"
                                type="submit">Admin Login</a>
                        </div>
                        <div class="mb-4">
                            <h5>User Panel</h5>
                            <p>This is the user panel where you can access your profile, settings, and content.</p>
                            <a href="{{ route('user.login') }}" class="btn btn-primary d-grid w-100 mb-3"
                                type="submit">User Login</a>
                        </div>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->
    @include('admin.layouts.footer')
</body>

</html>
