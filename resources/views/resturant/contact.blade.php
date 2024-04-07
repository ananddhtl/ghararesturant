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
        <h1 class="display-3 mb-3 animated slideInDown">Contact Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
    </div>
    <!-- Page Header End -->
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show container" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Contact Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Contact Us</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-primary text-white d-flex flex-column justify-content-center h-100 p-5">
                        <h5 class="text-white">Call Us</h5>
                        <p>
                            @foreach ($settings as $set)
                                @if ($set->siteKey == 'Phone')
                                    <i class="fa fa-phone-alt me-3"></i><a href="tel:{{ $set->siteValue }}"
                                        class="text-white">{{ $set->siteValue }}</a>
                                @endif
                            @endforeach
                        </p>
                        <h5 class="text-white">Email Us</h5>
                        <p>
                            @foreach ($settings as $set)
                                @if ($set->siteKey == 'Email')
                                    <i class="fa fa-envelope me-3"></i>
                                    <a href="mailto:{{ $set->siteValue }}">{{ $set->siteValue }}</a>
                                @endif
                            @endforeach
                        </p>
                        <h5 class="text-white">Our Location</h5>
                        @foreach ($settings as $set)
                            @if ($set->siteKey == 'Location')
                                <p class="mb-5"><i class="fa fa-map-marker-alt me-3"></i>{{ $set->siteValue }}
                                </p>
                            @endif
                        @endforeach
                        <h5 class="text-white">Follow Us</h5>
                        <div class="d-flex pt-2">
                            @foreach ($settings as $set)
                                @if ($set->siteKey == 'Instagram')
                                    <a class="btn btn-square btn-outline-light rounded-circle me-1"
                                        href="{{ $set->siteValue }}"><i class="fab fa-twitter"></i></a>
                                @endif
                            @endforeach
                            @foreach ($settings as $set)
                                @if ($set->siteKey == 'Facebook')
                                    <a class="btn btn-square btn-outline-light rounded-circle me-1"
                                        href="{{ $set->siteValue }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                            @endforeach
                            @foreach ($settings as $set)
                                @if ($set->siteKey == 'Youtube')
                                    <a class="btn btn-square btn-outline-light rounded-circle me-1"
                                        href="{{ $set->siteValue }}"><i class="fab fa-youtube"></i></a>
                                @endif
                            @endforeach
                            @foreach ($settings as $set)
                                @if ($set->siteKey == 'Twitter')
                                    <a class="btn btn-square btn-outline-light rounded-circle me-0"
                                        href="{{ $set->siteValue }}"><i class="fab fa-twitter"></i></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">

                    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input required type="text" class="form-control" id="name"
                                        placeholder="Your Name" name="name" />
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input required type="email" class="form-control" id="email"
                                        placeholder="Your Email" name="email" />
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input required type="text" class="form-control" id="subject" placeholder="Subject"
                                        name="subject" />
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 120px" name='message'
                                        required></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5 w-100" type="submit">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Google Map Start -->

    <!-- Google Map End -->
@endsection
