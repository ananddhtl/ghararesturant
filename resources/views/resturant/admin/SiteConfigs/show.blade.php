@extends('resturant.admin.inc.main')
@section('main-container')
    <main id="main" class="main">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid p-4">

                    <div class="pagetitle">
                        <div class="d-flex justify-content-between">
                            <h1>Edit</h1>
                            <a href="{{ route('settings.index') }}" class="btn btn-primary btn-md ">Back</a>
                        </div>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">edit-settings</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('settings.update', $setting->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="mb-3">
                                                <label for="exampleInputSiteKey1" class="form-label">siteKey</label>
                                                <input type="text" class="form-control" id="exampleInputSiteKey1"
                                                    aria-describedby="siteKeyHelp" name="siteKey" readonly
                                                    value="{{ $setting->siteKey }}">
                                                @error('siteKey')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="mb-3">
                                                <label for="exampleInputSiteValue1" class="form-label">SiteValue</label>
                                                <input type="text" class="form-control" id="exampleInputSiteValue1"
                                                    aria-describedby="siteValueHelp" name="siteValue" disabled
                                                    value="{{ $setting->siteValue }}">
                                                @error('siteValue')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            @php
                                                $siteValue = $setting->siteValue;
                                                $extension = pathinfo($siteValue, PATHINFO_EXTENSION);
                                            @endphp

                                            @if ($siteValue && in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                                                <div>
                                                    <img src="/uploads/{{ $siteValue }}" width="100%" 
                                                        alt="no" class="m-2">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
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
