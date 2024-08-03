<div class="sidebar sidebar-light sidebar-left sidebar-p-t" data-perfect-scrollbar>
    <div class="sidebar-heading">Menu</div>
    <ul class="sidebar-menu">

        @if (auth()->user()->role == 0)
            <li class="sidebar-menu-item  {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="sidebar-menu-button" href="{{ route('admin.dashboard') }}">
                    <i class="sidebar-menu-icon--left fas fa-columns"></i>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
            <li
                class="sidebar-menu-item
                {{ Request::is('admin/question-list') || Request::is('admin/add-question') || Request::is('admin/edit-question') ? 'active' : '' }}">

                <a class="sidebar-menu-button" href="{{ route('question.list') }}">
                    <i class="sidebar-menu-icon--left fas fa-question"></i>
                    <span class="sidebar-menu-text">Questions</span>
                </a>
            </li>
            <li class="sidebar-menu-item  {{ Request::is('admin/user-list') ? 'active' : '' }}">
                <a class="sidebar-menu-button" href="{{ route('user.list') }}">
                    <i class="sidebar-menu-icon--left fas fa-list"> </i>
                    <span class="sidebar-menu-text">Users</span>
                </a>
            </li>
            <li class="sidebar-menu-item  {{ Request::is('admin/feedback-list') ? 'active' : '' }}">
                <a class="sidebar-menu-button" href="{{ route('feedback.list') }}">
                    <i class="sidebar-menu-icon--left fas fa-comment"> </i>
                    <span class="sidebar-menu-text">Feedbacks</span>
                </a>
            </li>

            <li class="sidebar-menu-item  {{ Request::is('admin/loader') || Request::is('admin/add-loader') ? 'active' : '' }} ">
                <a class="sidebar-menu-button" href="{{ route('loader') }}">
                    <i class="sidebar-menu-icon--left fas fa-columns"></i>
                    <span class="sidebar-menu-text">Loader Contant</span>
                </a>
            </li>

            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-signup">Sign Up
                Modal</button> --}}
        @else
            @php
                $checkWeb = \App\Models\Website::where('user_id', Auth::id())->first();
            @endphp
            <li class="sidebar-menu-item  {{ Request::is('user/dashboard') ? 'active' : '' }}">
                <a class="sidebar-menu-button" href="{{ route('user.dashboard') }}">
                    <i class="sidebar-menu-icon--left fas fa-columns"></i>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
            {{-- @if (!$checkWeb) --}}
            <li class="sidebar-menu-item  {{ Request::is('user/create-website') ? 'active' : '' }}">
                <a class="sidebar-menu-button" href="{{ route('user.create.website') }}">
                    <i class="sidebar-menu-icon--left fas fa-columns"></i>
                    <span class="sidebar-menu-text">Create Website</span>
                </a>
            </li>
            {{-- @endif --}}


            {{-- @if ($checkWeb) --}}
            <li
                class="sidebar-menu-item  {{ Request::is('website') || Request::is('user/website-preview') ? 'active' : '' }}">
                <a class="sidebar-menu-button" href="{{ route('user.website.preview') }}">
                    <i class="sidebar-menu-icon--left fas fa-columns"></i>
                    <span class="sidebar-menu-text">User Website</span>
                </a>
            </li>
            {{-- @endif --}}
        @endif
        <li class="sidebar-menu-item  {{ Request::is('profile') ? 'active' : '' }}">
            <a class="sidebar-menu-button" href="{{ route('profile.view') }}">
                <i class="sidebar-menu-icon--left fas fa-edit"></i>
                <span class="sidebar-menu-text">Edit Account</span>
            </a>
        </li>

    </ul>
    <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
        <a href="#" class="flex d-flex align-items-center text-underline-0 text-body">
            <span class="avatar avatar-sm mr-2">

                @if (auth()->user()->profile_image)
                    <img src="{{ auth()->user()->profile_image }}" alt="avatar" class="avatar-img rounded-circle">
                @else
                    <img src="{{ asset('public/placeholder.jpg') }}" alt="avatar" class="rounded-circle" width="32">
                @endif

            </span>
            <span class="flex d-flex flex-column">
                <h6>{{ Str::ucfirst(auth()->user()->first_name) . ' ' . Str::ucfirst(auth()->user()->last_name) }}</h6>
                <small class="text-muted ">{{ auth()->user()->role == 0 ? 'Admin' : 'User' }}</small>
            </span>
        </a>
        <div class="dropdown ml-auto">
            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i
                    class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-item-text dropdown-item-text--lh">
                    <div>
                        <strong>
                            {{ Str::ucfirst(auth()->user()->first_name) . ' ' . Str::ucfirst(auth()->user()->last_name) }}
                        </strong>
                    </div>
                    <div>{{ auth()->user()->role == 0 ? 'Admin' : 'User' }}</div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('profile.view') }}">Edit account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>

</div>
