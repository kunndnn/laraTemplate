<!-- jQuery -->
<script src="{{ asset('public/assets/vendor/jquery.min.js') }} "></script>

<!-- Bootstrap -->
<script src="{{ asset('public/assets/vendor/popper.min.js') }} "></script>
<script src="{{ asset('public/assets/vendor/bootstrap.min.js') }} "></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('public/assets/vendor/perfect-scrollbar.min.js') }} "></script>

<!-- DOM Factory -->
<script src="{{ asset('public/assets/vendor/dom-factory.js') }} "></script>

<!-- MDK -->
<script src="{{ asset('public/assets/vendor/material-design-kit.js') }} "></script>

<!-- App -->
<script src="{{ asset('public/assets/js/toggle-check-all.js') }} "></script>
<script src="{{ asset('public/assets/js/check-selected-row.js') }} "></script>
<script src="{{ asset('public/assets/js/dropdown.js') }} "></script>
<script src="{{ asset('public/assets/js/sidebar-mini.js') }} "></script>
<script src="{{ asset('public/assets/js/app.js') }} "></script>

<!-- App Settings (safe to remove) -->
<script src="{{ asset('public/assets/js/app-settings.js') }}"></script>

<!-- Flatpickr -->
<script src="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.js') }} "></script>
<script src="{{ asset('public/assets/js/flatpickr.js') }} "></script>

<!-- Global Settings -->
<script src="{{ asset('public/assets/js/settings.js') }} "></script>

<!-- Moment.js -->
<script src="{{ asset('public/assets/vendor/moment.min.js') }} "></script>
<script src="{{ asset('public/assets/vendor/moment-range.js') }} "></script>

<!-- Chart.js -->
<script src="{{ asset('public/assets/vendor/Chart.min.js') }} "></script>

<!-- App Charts JS -->
<script src="{{ asset('public/assets/js/charts.js') }} "></script>
<script src="{{ asset('public/assets/js/chartjs-rounded-bar.js') }} "></script>

<!-- Chart Samples -->
<script src="{{ asset('public/assets/js/page.dashboard.js') }} "></script>
<script src="{{ asset('public/assets/js/progress-charts.js') }} "></script>

<!-- Vector Maps -->
<script src="{{ asset('public/assets/vendor/jqvmap/jquery.vmap.min.js') }} "></script>
<script src="{{ asset('public/assets/vendor/jqvmap/maps/jquery.vmap.world.js') }} "></script>
<script src="{{ asset('public/assets/js/vector-maps.js') }} "></script>


<!-- Dropzone -->
<script src="{{ asset('public/assets/vendor/dropzone.min.js') }}"></script>
<script src="{{ asset('public/assets/js/dropzone.js') }}"></script>

<!-- toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js">
</script>

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
