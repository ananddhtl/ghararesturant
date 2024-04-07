<!-- Footer Start -->
<div class="container-fluid bg-dark footer  pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                @foreach ($settings as $set)
                    @if ($set->siteKey == 'ResturantName')
                        <h1 class="fw-bold text-primary mb-4">{{ $set->siteValue }}</h1>
                    @endif
                @endforeach
                @foreach ($settings as $set)
                    @if ($set->siteKey == 'FooterDescription')
                        <p>{{ $set->siteValue }}</p>
                    @endif
                @endforeach
                <div class="d-flex pt-2">
                    @foreach ($settings as $set)
                        @if ($set->siteKey == 'Twitter')
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
                        @if ($set->siteKey == 'Instagram')
                            <a class="btn btn-square btn-outline-light rounded-circle me-0"
                                href="{{ $set->siteValue }}"><i class="fab fa-instagram"></i></a>
                        @endif
                    @endforeach

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                <p>
                    @foreach ($settings as $set)
                        @if ($set->siteKey == 'Location')
                            <i class="fa fa-map-marker-alt me-3"></i>{{ $set->siteValue }}
                        @endif
                    @endforeach
                </p>
                <p>
                    @foreach ($settings as $set)
                        @if ($set->siteKey == 'Phone')
                            <i class="fa fa-phone-alt me-3"></i><a href="tel:{{ $set->siteValue }}"
                                class="text-white">{{ $set->siteValue }}</a>
                        @endif
                    @endforeach
                </p>
                <p>


                    @foreach ($settings as $set)
                        @if ($set->siteKey == 'Email')
                            <i class="fa fa-envelope me-3"></i>
                            <a href="mailto:{{ $set->siteValue }}">{{ $set->siteValue }}</a>
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                <a class="btn btn-link" href="{{ route('testimonial') }}">People Review</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                <p>Subscribe to our Newsletter for updates</p>
                <form action="{{ route('newsletter.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email" name="email">
                        <button type="submit"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright text-center">
        @foreach ($settings as $set)
            @if ($set->siteKey == 'ResturantName')
                <div class="container">
                    &copy; <a href="#">{{ $set->siteValue }}</a>, All Right Reserved.
                </div>
            @endif
        @endforeach
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>

<script>
    @if (session('success'))
        toastr.success('{{ session('success') }}')
    @endif
    @if (session('error'))
        toastr.error('{{ session('error') }}')
    @endif
</script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
