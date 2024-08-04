<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title')</title>

<!-- Prevent the demo from appearing in search engines -->
<meta name="robots" content="noindex">
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Perfect Scrollbar -->
<link type="text/css" href="{{ asset('public/assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

<!-- App CSS -->
<link type="text/css" href="{{ asset('public/assets/css/app.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('public/assets/css/app.rtl.css') }}" rel="stylesheet">

<!-- Material Design Icons -->
<link type="text/css" href="{{ asset('public/assets/css/vendor-material-icons.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('public/assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">

<!-- Font Awesome FREE Icons -->
<link type="text/css" href="{{ asset('public/assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('public/assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">

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


<!-- Flatpickr -->
<link type="text/css" href="{{ asset('public/assets/css/vendor-flatpickr.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('public/assets/css/vendor-flatpickr.rtl.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('public/assets/css/vendor-flatpickr-airbnb.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('public/assets/css/vendor-flatpickr-airbnb.rtl.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">


<!-- Vector Maps -->
<link type="text/css" href="{{ asset('public/assets/vendor/jqvmap/jqvmap.min.css') }}" rel="stylesheet">


<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js">
</script>

<!-- Toastr -->
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

{{-- Google Font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
