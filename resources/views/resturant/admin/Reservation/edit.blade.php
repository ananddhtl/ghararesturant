@extends('resturant.admin.inc.main')
@section('main-container')
    <main id="main" class="main">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid p-4">

                    <div class="pagetitle">
                        <div class="d-flex justify-content-between">
                            <h1>Edit</h1>
                            <a href="{{ route('reservation.index') }}" class="btn btn-primary btn-md ">Back</a>
                        </div>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit-Reservation</li>
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
                                                    <label for="exampleInputTitle1" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="name"
                                                        value="{{ $reservation->name }}">
                                                    @error('name')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="email"
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
                                                        value="{{ $reservation->dateandtime }}">
                                                    @error('dateandtime')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">No of People</label>
                                                    <input type="number" min="1" max="4" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="noofpeople"
                                                        value="{{ $reservation->noofpeople }}">
                                                    @error('noofpeople')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">Reservation Status</label>
                                                    <select class="form-select" id="select1" name="reservation_status">
                                                        <option value="available" <?php echo $reservation->reservation_status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                        <option value="maintenance" <?php echo $reservation->reservation_status == 'booked' ? 'selected' : ''; ?>>Booked</option>
                                                        <option value="maintenance" <?php echo $reservation->reservation_status == 'available' ? 'selected' : ''; ?>>Available</option>
                                                        <option value="maintenance" <?php echo $reservation->reservation_status == 'canceled' ? 'selected' : ''; ?>>Canceled</option>
                                                    </select>
                                                    @error('reservation_status')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTitle1" class="form-label">Special Request</label>
                                                    <input type="text" class="form-control" id="exampleInputTitle1"
                                                        aria-describedby="titleHelp" name="specialrequest"
                                                        value="{{ $reservation->specialrequest }}">
                                                    @error('specialrequest')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Edit</button>
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
