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
        <h1 class="display-3 mb-3 animated slideInDown">Bookings</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Bookings</li>
            </ol>
        </nav>
    </div>
    </div>
    <!-- Page Header End -->
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show w-50 m-auto" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h3 class="section-title ff-secondary text-center text-primary fw-normal">Booking</h3>
        <h1 class="mb-5">Choose Your time</h1>
    </div>
    <div class="container my-3 py-3 text-center">
        <h5 class="text-primary"> Choose The time for your reservation</h5>
        <form action="{{ route('booking.table') }}" method="POST" class="py-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Date and Time</label>
                <input type="datetime-local" name="dateandtime" class="form-control w-50 m-auto" id="date"
                    placeholder="Booking Date" required min="{{ date('Y-m-d', strtotime('+1 day')) }}T9:00"
                    max="{{ date('Y-m-d', strtotime('+2 days')) }}T21:59">
                @error('dateandtime')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <h5 class="text-secondary"> We will find you available table that you can choose</h5>

    </div>
    <!-- Firm Visit Start -->
    <script>
        // Get the datetime input field
        var dateField = document.getElementById('date');

        // Get the current date
        var currentDate = new Date();

        // Calculate the minimum and maximum dates
        var minDate = new Date(currentDate.getTime()); // Tomorrow
        var maxDate = new Date(currentDate.getTime() + (86400000 * 2)); // Three days from tomorrow

        // Format dates as strings for the input field
        var minDateString = minDate.toISOString().slice(0, 16);
        var maxDateString = maxDate.toISOString().slice(0, 16);

        // Set the min and max attributes of the datetime input field
        dateField.setAttribute('min', minDateString);
        dateField.setAttribute('max', maxDateString);
    </script>
@endsection
