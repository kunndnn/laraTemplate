<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('layouts.header')
</head>
<style>
    .Roboto {
        font-family: "Roboto", sans-serif;
        font-weight: 700;
    }

    .poppins {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
    }

    .nunito {
        font-family: "Nunito", sans-serif;
        font-weight: 700;
    }

    .raleway {
        font-family: "Raleway", sans-serif;
        font-weight: 700;
    }

    .lato-thin {
        font-family: "Lato", sans-serif;
        font-weight: 700;
    }

    .montserrat {
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
    }

    .open-sans {
        font-family: "Open Sans", sans-serif;
        font-weight: 700;
    }

    .mdk-drawer-layout__content.page {
        transform: unset !important;
    }
</style>

<body class="layout-default">

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
            @include('layouts.navbar')
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">
                    <div class="container-fluid page__heading-container">
                        @include('layouts.secound-nev')

                    </div>
                    @yield('content')
                </div>
                <!-- // END drawer-layout__content -->

                <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                    <div class="mdk-drawer__content">

                        @include('layouts.sidebar')

                    </div>
                </div>
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <!-- App Settings FAB -->
    {{-- <div id="app-settings">
        <app-settings layout-active="default"
            :layout-location="{
                'default': '#',
                'fixed': 'fixed-dashboard.html',
                'fluid': 'fluid-dashboard.html',
                'mini': 'mini-dashboard.html'
            }"></app-settings>
    </div> --}}

    <!-- Sign Up Modal -->
    <div id="modal-signup" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3">
                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">
                            <a href="#" class="navbar-brand" style="min-width: 0">
                                {{-- <img class="navbar-brand-icon"
                                    src="{{ asset('public/assets/images/stack-logo-blue.svg') }}" width="25"
                                    alt="FlowDash"> --}}
                                <span>Feedback</span>
                            </a>
                        </div>

                        <form action="{{ route('user.add.feedback') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Name:</label>
                                <input class="form-control" type="text" id="username" required="" name="name"
                                    placeholder="Enter your name" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input class="form-control" type="email" id="email" required="" name="email"
                                    placeholder="Enter your email" />
                            </div>
                            <div class="form-group">
                                <label for="Subject">Subject:</label>
                                <input class="form-control" type="text" required="" id="Subject" name="subject"
                                    placeholder="Enter your subject" />
                            </div>
                            <div class="form-group">
                                <label for="Subject">Message:</label>
                                <textarea class="form-control" name="message" id="" cols="10" rows="5"
                                    placeholder="Enter your message" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // END .modal -->


    @include('layouts.footer')
</body>

</html>
