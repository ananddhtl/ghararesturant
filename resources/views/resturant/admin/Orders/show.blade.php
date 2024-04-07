@extends('resturant.admin.inc.main')
@section('main-container')
    <main id="main" class="main">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid p-4">

                    <div class="pagetitle">
                        <div class="d-flex justify-content-between">
                            <h1>Edit</h1>
                            <a href="{{ route('orders.index') }}" class="btn btn-primary btn-md ">Back</a>
                        </div>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">edit-Order</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
                    <section class="section">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('orders.update', $order->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputName1" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        aria-describedby="nameHelp" name="name" readonly
                                                        value="{{ $order->user->name }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputSubject1" class="form-label">Food Name</label>
                                                    <input type="text" class="form-control" id="exampleInputSubject1"
                                                        aria-describedby="subjectHelp" name="Food Name" readonly
                                                        value="{{ $order->foods->name }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Quantity</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="quantity" readonly
                                                        value="{{ $order->quantity }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="form-label">Food Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='food description' readonly>{{ $order->foods->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Food Status</label>
                                                        <select class="form-select " id="select1" name="food_status" value="{{ $order->food_status }}" disabled>
                                                            <option value="Ordered">Ordered</option>
                                                            <option value="Cooked">Cooked</option>
                                                            <option value="Delivering">Delivering</option>
                                                            <option value="Delivered">Delivered</option>
                                                        </select>
                                                    @error('food_status ')
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
