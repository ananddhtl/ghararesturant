


@extends('resturant.admin.inc.main')
@section('main-container')
    <main id="main" class="main">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid p-4">

                    <div class="pagetitle">
                        <div class="d-flex justify-content-between">
                            <h1>View</h1>
                            <a href="{{ route('reservation.index') }}" class="btn btn-primary btn-md ">Back</a>
                        </div>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">View-reservation</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
                    <section class="section">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('reservation.update', $reservation->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">name</label>
                                                    <input type="text" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="name" disabled
                                                        value="{{ $reservation->name }}">
                                                    @error('name')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">reservation_status</label>
                                                    <input type="text" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="reservation_status" disabled
                                                        value="{{ $reservation->reservation_status }}">
                                                    @error('reservation_status')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">email</label>
                                                    <input type="text" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="email" disabled
                                                        value="{{ $reservation->email }}">
                                                    @error('email')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">Date and Time</label>
                                                    <input type="datetime-local" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="dateandtime"
                                                        value="{{ $reservation->dateandtime }}" disabled>
                                                    @error('dateandtime')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">noofpeople</label>
                                                    <input type="text" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="noofpeople" disabled
                                                        value="{{ $reservation->noofpeople }}">
                                                    @error('noofpeople')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">specialrequest</label>
                                                    <input type="text" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="specialrequest" disabled
                                                        value="{{ $reservation->specialrequest }}">
                                                    @error('specialrequest')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </main>
    <script>
        function firstFunction() {
            var x = document.querySelector('input[name=img]:checked').value;
            document.getElementById('imagebox').value = x;  
        }
    </script>
@endsection
