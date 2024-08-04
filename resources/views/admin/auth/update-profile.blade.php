@extends('admin.layouts.master').
@section('tittle')
Profile
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <form id="formAccountSettings" method="POST" action="{{ route('profile' , $user->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @php
                            $img = $user->profile_image ?? asset('admin/assets/img/avatars/1.png');
                            @endphp
                            <img src="{{ $img }}" alt="user-avatar" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="image" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="firstName" name="firstName"
                                    value="{{ $user->first_name }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="lastName" id="lastName"
                                    value="{{ $user->last_name }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    value="{{ $user->email }}" placeholder="xxxxxx@gmail.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="phoneNumber" name="phone" class="form-control"
                                        placeholder="xxxxx-xxxxx" value="{{ $user->phone }}" />
                                </div>
                            </div>
                            <div class="col-md-12 pt-2 pb-2">
                                <p>
                                    <strong class="headings-color">Update Your Password</strong>
                                </p>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Old Password</label>
                                <div class="input-group input-group-merge">
                                    <input name="old_password" id="lastName" type="password"
                                        class="form-control {{ Session::get('old-pass-error') ? 'is-invalid' : '' }} passwordHideShowInput"
                                        placeholder="Old password" />
                                    <span class="input-group-text hideAndShowPass"><i class="bx bx-hide"></i></span>
                                </div>
                                @if (Session::get('old-pass-error'))
                                   <small class="invalid-feedback">{{ _('Old password does not match.') }}</small>
                                @endif
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="newPasswod" class="form-label">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input id="newPasswod" name="password" type="password" class="form-control
                                 {{ $errors->has('password') ? 'is-invalid' : '' }} passwordHideShowInput"
                                        placeholder="New password">
                                    <span class="input-group-text hideAndShowPass"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input name="confirm_password" id="confirm_password" type="password"
                                        class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }} passwordHideShowInput"
                                        placeholder="Confirm password" />
                                    <span class="input-group-text hideAndShowPass"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                </form>
            </div>
            <!-- /Account -->
        </div>

    </div>
</div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('.hideAndShowPass').click(function() {
            var inputField = $(this).closest('.input-group').find('.passwordHideShowInput');
            var type = inputField.attr('type');
            if (type === 'password') {
                inputField.attr('type', 'text');
                $(this).html('<i class="bx bx-show"></i>');
            } else {
                inputField.attr('type', 'password');
                $(this).html('<i class="bx bx-hide"></i>');
            }
        });
    });
</script>
@endpush
