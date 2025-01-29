<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div id="sidebarEffect"><canvas width="1707" height="468"></canvas></div>
    <div>
        <div class="logo-wrapper logo-wrapper-center">

            <h3 style="color:white;">Super Market Hub</h3>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar" checked="checked">
                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="#">
                <img class="img-fluid main-logo main-white"
                    src="{{ asset('admin/assets/images/logo/1-white.png') }}" alt="logo" loading="lazy" onerror="this.onerror=null; this.src='{{ asset('admin/assets/images/fallback.jpg') }}';">
                <img class="img-fluid main-logo main-dark"
                    src="{{ asset('admin/assets/images/logo/1-white.png') }}" alt="logo" loading="lazy" onerror="this.onerror=null; this.src='{{ asset('admin/assets/images/fallback.jpg') }}';">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow disabled" id="left-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <li class="back-btn"></li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav sidebarActive"
                                                href="{{ route('admin.dashboard') }}">
                                                <i class="ri-home-line"></i>
                                                <span>Dashboard</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                            </a>
                                        </li>


                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="{{route ('product.list')}}">
                                                <i class="ri-store-3-line"></i>
                                                <span>Products</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="{{route ('category.list')}}">
                                                <i class="ri-list-check-2"></i>
                                                <span>Categories</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="#">
                                                <i class="ri-user-3-line"></i>
                                                <span>Users</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="#">
                                                <i class="ri-archive-line"></i>
                                                <span>Orders</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                            </a>
                                        </li>
                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="#">
                                                <i class="ri-star-line"></i>
                                                <span>Product Review</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="{{route ('banner.list')}}">
                                                <i class="ri-star-line"></i>
                                                <span>Weekend Banner</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="{{route ('banner.label.list')}}">
                                                <i class="ri-star-line"></i>
                                                <span>Label </span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav" href="#">
                                                <i class="ri-phone-line"></i>
                                                <span>Support Ticket</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="{{route ('coupon.list')}}">
                                                <i class="ri-price-tag-3-line"></i>
                                                <span>Coupons</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="{{route ('brands.list')}}">
                                                <i class="ri-price-tag-3-line"></i>
                                                <span>Brands</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop" href="javascript:void(0)">

                                                <i class="ri-logout-box-line "></i>
                                                <span>Log out</span>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                                <div class="according-menu"><i class="ri-arrow-right-s-line"></i>
                                                </div>
                                            </a>

                                        </li>
                                        <i class="ri-logout-box-fill "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 659px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 203px; display: block; transform: translate3d(0px, 138px, 0px);"></div>
                    </div>
                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-arrow-right">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </nav>
    </div>
</div>
