{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}


<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('admin/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{ asset('admin/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('admin/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{ asset('admin/assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{ asset('admin/assets/js/dashboards-analytics.js')}}"></script>

<script src="{{ asset('admin/assets/js/pages-account-settings-account.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Include DataTables JS -->
<script src="{{ asset('admin/assets/vendor/DataTables/datatables.min.js') }}"></script>

<!-- Sweet Alert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toastr -->
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
