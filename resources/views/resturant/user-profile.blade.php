@extends('layouts.main')

@section('container')
    <!--Banner -->
    <!-- Page Header Start -->
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="container-fluid page-header mb-5 wow fadeIn"
                style="background: url({{ asset('uploads/' . ($set->siteValue != '' ? $set->siteValue : 'hero.jpg')) }}) top right no-repeat;"
                data-wow-delay="0.1s">
        @endif
    @endforeach
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">User Profile</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">User Profile</li>
            </ol>
        </nav>
    </div>
    </div>
    <!-- Page Header End -->
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
                            <form action="{{ route('userfr.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{-- @method('PUT') --}}
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="name" value="{{ $user->name }}">
                                            @error('name')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="exampleInputAddress" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="exampleInputAddress"
                                                aria-describedby="emailHelp" name="address" value="{{ $user->address }}">
                                            @error('address')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="phone" value="{{ $user->phone }}">
                                            @error('phone')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="email" value="{{ $user->email }}">
                                            @error('email')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <a href="{{ route('change.password') }}">Change The Password.</a>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
