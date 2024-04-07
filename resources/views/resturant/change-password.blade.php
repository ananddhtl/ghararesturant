@extends('layouts.main')

@section('container')
    <!--Banner -->
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="container-fluid page-header mb-5 wow fadeIn"
                style="background: url({{ asset('uploads/' . ($set->siteValue != '' ? $set->siteValue : 'hero.jpg')) }}) top right no-repeat;"
                data-wow-delay="0.1s">
        @endif
    @endforeach
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>
    </div>
    <!-- Page Header End -->

    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show w-60 m-auto" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!--Banner -->
    <!-- Team Start -->
    <div class=" pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">User Profile</h5>
            </div>
            <div class="card" style="width:100%;" class="p-5">
                <div class="row py-3">
                    <div class="col-3 px-5 py-3 border-end h-50 my-auto">
                        <h2><i class="fa fa-user-circle" aria-hidden="true"></i> {{ $user->name }}</h2>
                        <hr>
                        <div class="addresses">
                            <h4>Phone:
                                <br><span class="text-primary">{{ $user->phone }}</span>
                            </h4>
                            <h4>Address:<br> <span class="text-primary">{{ $user->address }}</span></h4>
                            <h4>Email: <br><span class="text-primary">{{ $user->email }}</span></h4>

                        </div>
                        <hr>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary rounded-3">Log-out</button>
                        </form>
                    </div>
                    <div class="col-9">
                        <div class="card-body">
                            <div class="head text-center">
                                <h2 class="card-text">Want to change Your data?</h2>
                                <hr class="my-3">
                            </div>
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                <div>
                                    <label for="update_password_current_password" class="form-label">Current
                                        Password</label>
                                    <input id="update_password_current_password" name="current_password" type="password"
                                        class="form-control" autocomplete="current-password" />
                                    <!-- Display validation errors if any -->
                                    @if ($errors->updatePassword->has('current_password'))
                                        <small
                                            class="text-red-500">{{ $errors->updatePassword->first('current_password') }}</small>
                                    @endif
                                </div>

                                <div>
                                    <label for="update_password_password" class="form-label">New Password</label>
                                    <input id="update_password_password" name="password" type="password"
                                        class="form-control" autocomplete="new-password" />
                                    <!-- Display validation errors if any -->
                                    @if ($errors->updatePassword->has('password'))
                                        <small class="text-red-500">{{ $errors->updatePassword->first('password') }}</small>
                                    @endif
                                </div>

                                <div>
                                    <label for="update_password_password_confirmation" class="form-label">Confirm
                                        Password</label>
                                    <input id="update_password_password_confirmation" name="password_confirmation"
                                        type="password" class="form-control" autocomplete="new-password" />
                                    <!-- Display validation errors if any -->
                                    @if ($errors->updatePassword->has('password_confirmation'))
                                        <small
                                            class="text-red-500">{{ $errors->updatePassword->first('password_confirmation') }}</small>
                                    @endif
                                </div>

                                <div class="flex items-center gap-4 mt-2">
                                    <button type="submit"
                                        class=" btn btn-primary btn-md">{{ __('Update') }}</button>

                                    @if (session('status') === 'password-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#exampleInputAddress').focus(function() {
                alert('Please write your full address.');
            });
        });
    </script>
    <!-- Team End -->
@endsection
