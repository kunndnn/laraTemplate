@extends('layouts.master')
@section('title')
    Edit Account
@endsection
@section('content')
    <div class="container-fluid page__container">
        <form class="theme-form theme-form-2 mega-form" action="{{ route('profile.form.submit') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col-lg-4 card-body">
                        <p>
                            <strong class="headings-color">Basic Information</strong>
                        </p>
                        <p class="text-muted">
                            Edit your account details and settings.
                        </p>
                    </div>
                    <div class="col-lg-8 card-form__body card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fname">First name</label>
                                    <input id="fname" name="first_name" type="text" class="form-control"
                                        placeholder="First name" value="{{ $user->first_name }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lname">Last name</label>
                                    <input id="lname" name="last_name" type="text" class="form-control"
                                        placeholder="Last name" value="{{ $user->last_name }}" />
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="desc">Bio / Description</label>
                            <textarea id="desc" rows="4" class="form-control" placeholder="Bio / description ..."></textarea>
                        </div> --}}

                        <div class="form-group">
                            <label for="country">Gender</label><br />
                            <select id="country" name="gender" class="custom-select" style="width: auto">
                                <option disabled>Select</option>
                                <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Male</option>
                                <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Female</option>
                                <option value="3" {{ $user->gender == 3 ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col-lg-4 card-body">
                        <p>
                            <strong class="headings-color">Update Your Password</strong>
                        </p>
                        <p class="text-muted">Change your password.</p>
                    </div>
                    <div class="col-lg-8 card-form__body card-body">
                        <div class="form-group">
                            <label for="opass">Old Password</label>
                            <input style="width: 270px" name="old_password" id="opass" type="password"
                                class="form-control {{ Session::get('old-pass-error') ? 'is-invalid' : '' }}"
                                placeholder="Old password" />
                            @if (Session::get('old-pass-error'))
                                <small class="invalid-feedback">{{ _('Old password does not match.') }}</small>
                            @endif
                            @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="npass">New Password</label>
                            <input style="width: 270px" id="npass" name="password" type="password"
                                class="form-control
                            {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="New password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            {{-- <small class="invalid-feedback">The new password must not be empty.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="cpass">Confirm Password</label>
                            <input style="width: 270px" name="confirm_password" id="cpass" type="password"
                                class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}"
                                placeholder="Confirm password" />
                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col-lg-4 card-body">
                        <p>
                            <strong class="headings-color">Profile Settings</strong>
                        </p>
                        <p class="text-muted">
                            Update your public profile with relevant and meaningful
                            information.
                        </p>
                    </div>
                    <div class="col-lg-8 card-form__body card-body">

                        <div class="form-group">
                            {{-- <label class="dz-clickable">Avatar</label> --}}

                            {{--
                                <div class="dz-clickable media align-items-center" data-toggle="dropzone"
                                data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable"
                                data-dropzone-files='["{{ asset('public/assets/images/account-add-photo.svg') }}"]'>
                                <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                    <div class="avatar" style="width: 80px; height: 80px">
                                        <img src="{{ asset('public/assets/images/account-add-photo.svg') }}"
                                            class="avatar-img rounded" alt="..." data-dz-thumbnail />
                                    </div>
                                </div>
                                <input type="file" accept="image/*"> name="image" />
                                <div class="media-body">
                                    <div class="btn btn-sm btn-primary dz-clickable">Choose photo
                                    </div>
                                </div>
                            </div>
                            --}}

                            <div class="media align-items-center">
                                <div class="dz-preview dz-file-preview  mr-3">
                                    <div class="avatar" style="width: 80px; height: 80px">
                                        @if ($user->profile_image)
                                            <img src="{{ $user->profile_image }}" class="imgPreview"
                                                alt=""style="width: 80px; height: 80px">
                                        @else
                                            <img src="{{ asset('public/assets/images/account-add-photo.svg') }}"
                                                class="imgPreview" alt="sadsad" style="width: 80px; height: 80px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <input type="file"  accept="image/*" name="image" onchange="showImage()"
                                    class="btn btn-sm btn-primary">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="social1">Social links</label>
                            <div class="input-group input-group-merge mb-2" style="width: 270px">
                                <input id="social1" type="text" class="form-control form-control-prepended"
                                    placeholder="Facebook" />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fab fa-facebook"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-merge mb-2" style="width: 270px">
                                <input id="social2" type="text" class="form-control form-control-prepended"
                                    placeholder="Twitter" />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fab fa-twitter"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-merge mb-2" style="width: 270px">
                                <input id="social3" type="text" class="form-control form-control-prepended"
                                    placeholder="Instagram" />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fab fa-instagram"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mb-5">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>

    <script>
        const imageUploader = document.querySelector("input[name='image']");
        const imagePreview = document.querySelector(".imgPreview");

        console.log(imageUploader);
        console.log(imagePreview);

        imageUploader.addEventListener('change', showImage);

        function showImage() {
            if (imageUploader.files.length > 0) {
                let reader = new FileReader();
                reader.readAsDataURL(imageUploader.files[0]);
                reader.onload = function(e) {
                    imagePreview.classList.add("show");
                    imagePreview.src = e.target.result;
                };
            }
        }
    </script>
@endsection
