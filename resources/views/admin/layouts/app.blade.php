<!DOCTYPE html>
<html>

<head>
    {{-- header --}}
    @include('admin.partials.head')
    @stack('style')
</head>

<body>

    <!-- page-wrapper Start -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        {{-- header --}}
        @include('admin.partials.header')

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            {{-- sidebar --}}
            @include('admin.partials.sidebar')
            <!-- tracking section start -->
            <div class="page-body">

                {{-- main content --}}
                @yield('content')

                {{-- footer --}}
                @include('admin.partials.footer')
            </div>
            <!-- tracking section End -->
        </div>
    </div>
    {{-- toastr --}}
    @include('admin.partials.toastr')

    {{-- scripts --}}
    @stack('script')
</body>

</html>
