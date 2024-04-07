@extends('resturant.admin.inc.main')
@section('main-container')
    <main id="main" class="main">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid p-4">

                    <div class="pagetitle">
                        <div class="d-flex justify-content-between">
                            <h1>Add</h1>
                        </div>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">add-about_feature</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
                    <section class="section">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('about_features.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputText1" class="form-label">Feature</label>
                                                    <input type="text" class="form-control" id="exampleInputText1"
                                                        aria-describedby="textHelp" name="feature">
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
    </main>
    <script>
        function checkWordCount(textarea) {
            var words = textarea.value.trim().split(/\s+/).length;
            if (words > 250) {
                alert("You have exceeded the word limit of 250.");
                textarea.value = textarea.value.trim().split(/\s+/).slice(0, 250).join(" ");
            }
        }

        function firstFunction() {
            var x = document.querySelector('input[name=img]:checked').value;
            document.getElementById('imagebox').value = x;
        }
    </script>
@endsection
