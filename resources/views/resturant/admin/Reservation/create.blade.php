@extends('resturant.admin.inc.main')
@section('main-container')
    <main id="main" class="main">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid p-4">

                    <div class="pagetitle">
                        <div class="d-flex justify-content-between">
                            <h1>Create</h1>
                            <a href="{{ route('reservation.index') }}" class="btn btn-primary btn-md "><i class="fa fa-bars"
                                    aria-hidden="true"></i></a>
                        </div>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">Add-reservation</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
                    <section class="section">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputText1" class="form-label">name</label>
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
                                                    <input type="datetime-local" class="form-control" id="exampleInputText1"
                                                        aria-describedby="textHelp" name="dateandtime">
                                                        @error('dateandtime')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputText1" class="form-label">No Of People</label>
                                                    <input type="number" min="1" max="4" class="form-control" id="exampleInputText1"
                                                        aria-describedby="textHelp" name="noofpeople">
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
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
