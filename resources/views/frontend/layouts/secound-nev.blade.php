<div class="page__heading d-flex align-items-end">
    <div class="flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                @php
                    $checkUrl = auth()->user()->role == 0 ? 'admin' : 'user';
                    $includeLI =
                        "<li class='breadcrumb-item'><a href='" .
                        route($checkUrl . '.dashboard') .
                        "'>
                      <i class='material-icons icon-20pt'>home</i></a></li>";

                @endphp
                @if (Request::is('admin/dashboard'))
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                @elseif (Request::is('user/dashboard'))
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                @elseif (Request::is('user/create-website'))
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">create-website</li>
                @elseif (Request::is('profile'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
                @elseif (Request::is('admin/user-list'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">User List</li>
                @elseif (Request::is('admin/question-list'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">Question List</li>
                @elseif (Request::is('admin/add-question'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">Add Question</li>
                @elseif (Request::is('admin/edit-question'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">Edit Question</li>
                @elseif (Request::is('admin/feedback-list'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">Feedback List</li>
                @elseif (Request::is('admin/loader'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">Loader List</li>
                @elseif (Request::is('admin/add-loader'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">Add Loader</li>
                @elseif (Request::is('user/user-website/*'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">User Website</li>
                @elseif (Request::is('user/website-preview'))
                    {!! $includeLI !!}
                    <li class="breadcrumb-item active" aria-current="page">Website Preview</li>
                @endif
            </ol>
        </nav>

        <h3>
            @if (Request::is('admin/dashboard') || Request::is('user/dashboard'))
                Dashboard
            @elseif (Request::is('profile'))
                Edit Account
            @elseif (Request::is('admin/user-list'))
                User List
            @elseif (Request::is('admin/question-list'))
                Question List
            @elseif (Request::is('admin/add-question'))
                Add Question
            @elseif (Request::is('admin/edit-question'))
                Edit Question
            @elseif (Request::is('admin/feedback-list'))
                Feedback List
            @elseif (Request::is('admin/loader'))
                Loader List
            @elseif (Request::is('admin/add-loader'))
                Add Loader
            @elseif (Request::is('user/create-website'))
                Create Website
            @elseif (Request::is('user/user-website/*'))
                User Website
            @elseif (Request::is('user/website-preview'))
                Website Preview
            @endif
        </h3>

    </div>
</div>
