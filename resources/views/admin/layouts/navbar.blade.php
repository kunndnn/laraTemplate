<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            {{-- <i class="bx bx-search fs-4 lh-0"></i> --}}
            <input type="text" class="form-control border-0 shadow-none" placeholder="ADMIN PANEL"
                aria-label="Search..." disabled/>
        </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    @php
                        $img = auth()->user()->profile_image ?? asset('admin/assets/img/avatars/1.png');
                        $first_name = auth()->user()->first_name ?? '--' ;
                        $last_name = auth()->user()->last_name ?? '--' ;
                    @endphp
                    <img src="{{ $img }}" alt="profile_image" class="w-px-40  rounded-circle" />
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ $img }}" alt
                                        class="w-px-40  rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ $first_name .' '. $last_name }}</span>
                                <small class="text-muted">{{ _('Admin') }}</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ Request::is('admin/profile/*') ? 'active' : '' }}"
                    href="{{ route('profile' , auth()->id()) }}">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>
