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
        <h1 class="mb-5">Reserve a table</h1>
        <h1 class="mb-5">You can See available table under form <a href="#tableDisplay">click me</a></h1>
    </div>
    <!-- Firm Visit Start -->
    <div class="container-fluid bg-primary bg-icon py-5 ">
        <!-- Booking Start -->
        <div class="container-fluid bg-primary bg-icon mt-4">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="section-title ff-secondary text-center text-primary fw-normal text-white">Reservation</h3>
                    <h1 class="mb-5 text-white">Book a table</h1>
                </div>
                <div class="row g-0">
                    <div class="col-md-6">
                        @foreach ($settings as $set)
                            @if ($set->siteKey == 'BookinVideo')
                                <div class="video"
                                    style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)),url({{ asset('uploads/' . ($set->siteValue != '' ? $set->siteValue : 'buff-momo-1.png')) }}); background-repeat: no-repeat;
                                background-size: cover;">
                                    <button type="button" class="btn-play" data-bs-toggle="modal"
                                        data-src="{{ $set->siteValue }}" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6 bg-dark d-flex align-items-center">
                        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                            <h1 class="text-white mb-4">Book A Table Online</h1>
                            <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputText1" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="exampleInputText1"
                                                aria-describedby="textHelp" name="name">
                                            @error('name')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputText1" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="exampleInputText1"
                                                aria-describedby="textHelp" name="email">
                                            @error('email')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputText1" class="form-label">Date and Time</label>
                                            <input type="datetime-local" name="dateandtime" class="form-control"
                                                value="{{ $dateTime }}" readonly>
                                            @error('dateandtime')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputText1" class="form-label">Table no</label>
                                            <select class="form-select" id="selectTable" class="form-control"
                                                id="exampleInputText1" aria-describedby="textHelp" name="table_id">
                                                @foreach ($tables as $table)
                                                    <option value="{{ $table->id }}">Table no:
                                                        {{ $table->table_no }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('noofpeople')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputText1" class="form-label">No Of People</label>
                                            <select class="form-select" id="select1" class="form-control"
                                                id="exampleInputText1" aria-describedby="textHelp" name="noofpeople">
                                                <option value="1">People 1</option>
                                                <option value="2">People 2</option>
                                                <option value="3">People 3</option>
                                                <option value="4">People 4</option>
                                            </select>
                                            @error('noofpeople')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputText1" class="form-label">Special Request</label>
                                            <input type="text" class="form-control" id="exampleInputText1"
                                                aria-describedby="textHelp" name="specialrequest">
                                            @error('specialrequest')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="my-2">If there is more than 4 people Please Call us For reservation</div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            @foreach ($settings as $set)
                                @if ($set->siteKey == 'BookinVideo')
                                    <iframe class="embed-responsive-item" src="{{ $set->siteValue }}" id="video"
                                        allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->
    </div>
    @if (count($tables))
        <section class="container my-5" id="tableDisplay">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="section-title ff-secondary text-center text-primary fw-normal">Our Tables</h3>
                <h1 class="mb-5">Choose a table</h1>
            </div>
            <div class="row ">

                @foreach ($tables as $table)
                    <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp mb-5" data-wow-delay="0.1s"
                        style="cursor: pointer;">
                        <div class="service-item rounded pt-3 mx-auto bg-success" style="width: 12.5rem "
                            data-bs-toggle="modal" data-bs-target="#modalId{{ $table->id }}">
                            @if ($table->reservation)
                                @if (strtotime(date('Y-m-d H:i:s')) >= strtotime($table->reservation->dateandtime) &&
                                        strtotime(date('Y-m-d H:i:s')) - 7200 <= strtotime($table->reservation->dateandtime))
                                    <button type="button" class="btn btn-light">
                                        Booked
                                    </button>
                                @else
                                    <button type="button" class="btn btn-primary">
                                        Available
                                    </button>
                                @endif
                            @else
                                <button type="button" class="btn btn-primary">
                                    Available
                                </button>
                            @endif
                            <div class="p-4">
                                <img src="{{ asset('uploads/dining-table-icon.png') }}" alt=""
                                    style="height:100px;" class="w-100">
                                <h6 class="text-center"> Table no: <span id="tableNum">{{ $table->table_no }}</span>
                                </h6>
                            </div>
                        </div>
                        <!-- Modal trigger button -->
                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId{{ $table->id }}" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Table No: {{ $table->table_no }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <img src="{{ asset('uploads/' . $table->img) }}" alt=""
                                                    class="w-100" style="object-fit: cover">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="text-center">
                                                    <h4 class="text-dark">Table no : {{ $table->table_no }}</h4>
                                                </div>
                                                <p>{{ $table->description }}</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <a href="#" onclick="booktable(this,'{{ $table->id }}')"
                                            class="btn btn-primary">Book this
                                            table</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($booked_tables as $table)
                    <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp mb-5" data-wow-delay="0.1s"
                        style="cursor: pointer;">
                        <div class="service-item rounded pt-3 mx-auto bg-danger" style="width: 12.5rem "
                            data-bs-toggle="modal" data-bs-target="#modalId{{ $table->id }}">
                            <button type="button" class="btn btn-light">
                                Booked
                            </button>

                            <div class="p-4">
                                <img src="{{ asset('uploads/dining-table-icon.png') }}" alt=""
                                    style="height:100px;" class="w-100">
                                <h6 class="text-center"> Table no: <span id="tableNum">{{ $table->table_no }}</span>
                                </h6>
                            </div>
                        </div>
                        <!-- Modal trigger button -->
                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId{{ $table->id }}" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Table No: {{ $table->table_no }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <img src="{{ asset('uploads/' . $table->img) }}" alt=""
                                                    class="w-100" style="object-fit: cover">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="text-center">
                                                    <h4 class="text-dark">Table no : {{ $table->table_no }}</h4>
                                                </div>
                                                <p>{{ $table->description }}</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <p>This table is booked in this current time</p>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
    @endif
    @if (count($tables) <= 0)
        <p class="text-center my-4">
            No tables Found Please call us for further info
            @foreach ($settings as $set)
                @if ($set->siteKey == 'Phone')
                    <i class="fa fa-phone-alt me-3"></i><a href="tel:{{ $set->siteValue }}"
                        class="text-white">{{ $set->siteValue }}</a>
                @endif
            @endforeach
        </p>
    @endif
    <!-- Firm Visit End -->
    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId"),
            options,
        );
    </script>
    <script>
        function booktable(element, table) {
            document.getElementById('selectTable').value = table;
            element.parentElement.children[0].click()
            var bookingTableElement = document.getElementById('bookingTable');
            // Check if the element with id 'bookingTable' exists
            if (bookingTableElement) {
                // Scroll to the 'bookingTable' element without smooth behavior
                bookingTableElement.scrollIntoView();
            }


        }
        // Get the datetime input field
        var dateField = document.getElementById('date');

        // Get the current date
        var currentDate = new Date();

        // Calculate the minimum and maximum dates
        var minDate = new Date(currentDate.getTime()); // Tomorrow
        var maxDate = new Date(currentDate.getTime() + (86400000 * 3)); // Three days from tomorrow

        // Format dates as strings for the input field
        var minDateString = minDate.toISOString().slice(0, 16);
        var maxDateString = maxDate.toISOString().slice(0, 16);

        // Set the min and max attributes of the datetime input field
        dateField.setAttribute('min', minDateString);
        dateField.setAttribute('max', maxDateString);
    </script>
@endsection
