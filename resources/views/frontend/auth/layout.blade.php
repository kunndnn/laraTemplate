<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('admin/assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin/assets/css/app.rtl.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('admin/assets/css/vendor-material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin/assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{ asset('admin/assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin/assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-133433427-1');
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

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

<body class="layout-login">

    <div class="layout-login__overlay"></div>

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('admin/assets/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('admin/assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('admin/assets/vendor/perfect-scrollbar.min.js') }}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('admin/assets/vendor/dom-factory.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('admin/assets/vendor/material-design-kit.js') }}"></script>

    <!-- App -->
    <script src="{{ asset('admin/assets/js/toggle-check-all.js') }}"></script>
    <script src="{{ asset('admin/assets/js/check-selected-row.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropdown.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sidebar-mini.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('admin/assets/js/app-settings.js') }}"></script>


    <!-- toastr-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        function showToast(message, title, type) {
            toastr[type](message, title, {
                timeOut: 5000,
                closeButton: true,
                progressBar: true
            });
        }

        @if (Session::has('success'))
            showToast("{{ Session::get('success') }}", 'Success', 'success');
        @endif

        @if (Session::has('error'))
            showToast("{{ Session::get('error') }}", 'Error', 'error');
        @endif
    </script>

</body>

</html>
