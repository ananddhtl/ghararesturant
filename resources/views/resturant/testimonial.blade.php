@extends('layouts.main')
@section('container')
    <!-- Page Header Start -->
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="container-fluid page-header wow fadeIn"
                style="background: url({{ asset('uploads/' . ($set->siteValue != '' ? $set->siteValue : 'hero.jpg')) }}) top right no-repeat;"
                data-wow-delay="0.1s">
        @endif
    @endforeach
    <div class="container">
        <h1 class="display-3  animated slideInDown">Testimonial</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Testimonial</li>
            </ol>
        </nav>
    </div>
    </div>
    <!-- Page Header End -->

    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 ">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Review</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @forelse ($testimonials as $testimonial)
                    <div class="testimonial-item position-relative bg-white p-5 mt-4">
                        <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                        <p class="mb-4">{{ $testimonial->description }}</p>
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 rounded-circle" src="{{ asset('uploads/' . $testimonial->img) }}"
                                alt="">
                            <div class="ms-3">
                                <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                <span>{{ $testimonial->profession }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center text-primary">
                        No data Found
                    </h3>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
