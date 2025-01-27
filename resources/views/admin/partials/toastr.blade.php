<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.css') }}">
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
<!-- Toastr -->
<script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
<script>
    const showToast = (message = 'Success', title = 'Success', type = 'success') => {
        toastr.clear(); // Clear existing toasts
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
    {{ Session::forget('success') }}
</script>
