@extends('layouts.main')
@section('container')
    <!-- Page Header Start -->
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="container-fluid page-header mb-5 wow fadeIn"
                style="background: url({{ asset('uploads/' . ($set->siteValue != '' ? $set->siteValue : 'hero.jpg')) }}) top right no-repeat;"
                data-wow-delay="0.1s">
        @endif
    @endforeach
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class=" container py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100"
                            src="{{ asset('uploads/' . ($about->img != '' ? $about->img : 'hero.jpg')) }}">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">{{ $about->title }}</h1>
                    <p class="mb-4">{{ $about->description }}</p>
                    @foreach ($aboutFeature as $feature)
                        <p><i class="fa fa-check text-primary me-3"></i>{{ $feature->feature }}</p>
                    @endforeach
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Booking Start -->
    <div class="container-fluid bg-primary bg-icon mt-5 py-5">
        <div class="container">

            <div class="p-5 wow fadeInUp text-center  bg-dark" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Reservation</h5>
                <h1 class="text-white mb-4">Book A Table Online</h1>
                <p>You can select Your desierd Table and Book a table suitable for you and your friends.</p>
                <a href="/booking" class="btn btn-primary">Book a Table</a>
            </div>

        </div>
    </div>
@endsection
