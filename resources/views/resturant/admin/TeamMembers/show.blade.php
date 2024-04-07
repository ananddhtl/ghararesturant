@extends('resturant.admin.inc.main')
@section('main-container')
    <main id="main" class="main">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid p-4">

                    <div class="pagetitle">
                        <div class="d-flex justify-content-between">
                            <h1>Edit</h1>
                            <a href="{{ route('team_members.index') }}" class="btn btn-primary btn-md ">Back</a>
                        </div>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">edit-team_memebers</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
                    <section class="section">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('team_members.update', $team->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputName1" class="form-label">Name</label>
                                                    <input disabled type="text" class="form-control" id="exampleInputName1"
                                                        aria-describedby="nameHelp" name="name" value="{{$team->name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputName1" class="form-label">Qualification</label>
                                                    <input disabled type="text" class="form-control" id="exampleInputName1"
                                                        aria-describedby="nameHelp" name="qualification" value="{{$team->qualification}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputPost1" class="form-label">Post</label>
                                                    <input disabled type="text" class="form-control" id="exampleInputPost1"
                                                        aria-describedby="postHelp" name="post" value="{{$team->post}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputInstagram1" class="form-label">Instagram</label>
                                                    <input disabled type="text" class="form-control" id="exampleInputInstagram1"
                                                        aria-describedby="instagramHelp" name="instagram" value="{{$team->instagram}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputFacebook1" class="form-label">Facebook</label>
                                                    <input disabled type="text" class="form-control" id="exampleInputFacebook1"
                                                        aria-describedby="facebookHelp" name="facebook" value="{{$team->facebook}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputTwitter1" class="form-label">Twitter</label>
                                                    <input disabled type="text" class="form-control" id="exampleInputTwitter1"
                                                        aria-describedby="twitterHelp" name="twitter" value="{{$team->twitter}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputDescription1"
                                                        class="form-label">Description</label>
                                                    <input disabled type="text" class="form-control" id="exampleInputDescription1"
                                                        aria-describedby="descriptionHelp" name="description"
                                                        value="{{ $team->description }}">
                                                    @error('description')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="form-label">Sub_Description</label>
                                                    <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="3" name='sub_description'>{{ $team->sub_description }}</textarea>
                                                </div>
                                                @error('sub_description')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>



                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                    <!-- Modal trigger button -->

                                                    <!-- Modal Body -->
                                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                                    <div class="modal fade" id="modalId" tabindex="-1"
                                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                        aria-labelledby="modalTitleId" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalTitleId">Choose photo
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <style>
                                                                        [type=radio]:checked+img {
                                                                            outline: 2px solid #f00;
                                                                        }
                                                                    </style>

                                                                    @foreach ($files as $file)
                                                                        <label>
                                                                            <input disabled type="radio" name="img"
                                                                                value="{{ $file->img }}"
                                                                                style="opacity: 0;" />
                                                                            <img src="{{ asset('uploads/' . $file->img) }}"
                                                                                alt="" height="100px;"
                                                                                width="100px;" style="margin-right:20px;">
                                                                        </label>
                                                                    @endforeach

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="modal"
                                                                        onclick=" firstFunction()">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Optional: Place to the bottom of scripts -->
                                                    <script>
                                                        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                                                    </script>
                                                </div>
                                                <div class="form-group col-12 mb-0">
                                                    <label class="col-form-label">Image</label>
                                                </div>
                                                
                                                <div class="input disabled-group mb-3 col">
                                                    <input disabled id="imagebox" type="text" class="form-control" 
                                                        name="img" readonly value="{{ $team->img }}">
                                                    <div class="input disabled-group-append">
                                                      
                                                        @error('img')
                                                            <small>{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <img src="{{ asset('uploads/' . $team->img) }}" alt="" class="w-100">

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
            var x = document.querySelector('input disabled[name=img]:checked').value;
            document.getElementById('imagebox').value = x;  
        }
    </script>
@endsection





