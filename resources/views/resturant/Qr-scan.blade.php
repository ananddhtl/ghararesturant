<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body style="background-color: #FF6701">
    <div class="p-3">
        <div class="card text-white"
            style="
                    width: 100%;
                    background: linear-gradient(
                        rgba(15, 23, 43, 0.9),
                        rgba(15, 23, 43, 0.9)
                    );
                ">
            <div class="card-body">
                <div class="text-center">
                    <h2>
                        @foreach ($settings as $set)
                            @if ($set->siteKey == 'ResturantName')
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <a href="{{ route('/') }}"
                                    style="text-decoration: none;color:#FF6701;">{{ $set->siteValue }}</a>
                            @endif
                        @endforeach
                    </h2>
                    <h3>Menu</h3>
                    <h6>Take your time and Order</h6>
                </div>
                <hr class="mx-2">
                <div class="row pb-3">
                    <div class="col-lg-6 col-md-6 col sm-12 border-end p-3 mb-3">
                        <h6 class="mx-3">Breakfast</h6>
                        @foreach ($breakfast as $food)
                            <div class="col-lg-12 py-2 px-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('uploads/' . $food->img) }}" alt="" style="width: 40px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h6 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $food->name }}</span>
                                            <span class="text-primary">Rs{{ $food->price }}</span>
                                        </h6>
                                        <small class="fst-italic">{{ $food->description }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <hr class="mx-3">
                        <h6 class="mx-3">Lunch</h6>
                        @foreach ($lunch as $food)
                            <div class="col-lg-12 py-2 px-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('uploads/' . $food->img) }}" alt="" style="width: 40px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h6 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $food->name }}</span>
                                            <span class="text-primary">Rs{{ $food->price }}</span>
                                        </h6>
                                        <small class="fst-italic">{{ $food->description }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <hr class="mx-3">
                        <h6 class="mx-3">Dinner</h6>
                        @foreach ($dinner as $food)
                            <div class="col-lg-12 py-2 px-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('uploads/' . $food->img) }}" alt="" style="width: 40px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h6 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $food->name }}</span>
                                            <span class="text-primary">Rs{{ $food->price }}</span>
                                        </h6>
                                        <small class="fst-italic">{{ $food->description }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-md-6 col sm-12">
                        <h6 class="mx-3">Drinks</h6>
                        @foreach ($drinks as $food)
                            <div class="col-lg-12 py-2 px-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('uploads/' . $food->img) }}" alt="" style="width: 40px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h6 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $food->name }}</span>
                                            <span class="text-primary">Rs{{ $food->price }}</span>
                                        </h6>
                                        <small class="fst-italic">{{ $food->description }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <hr class="mx-3">
                        <h6 class="mx-3">Desert</h6>
                        @foreach ($desert as $food)
                            <div class="col-lg-12 py-2 px-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('uploads/' . $food->img) }}" alt="" style="width: 40px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h6 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $food->name }}</span>
                                            <span class="text-primary">Rs{{ $food->price }}</span>
                                        </h6>
                                        <small class="fst-italic">{{ $food->description }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr class="mx-3">
                </div>
                <div class="px-5" style="text-align: center"> You can order Food Via Website or call us on

                    <i class="fa fa-phone" aria-hidden="true"></i>
                    @foreach ($settings as $set)
                        @if ($set->siteKey == 'Phone')
                            <a href="tel:{{ $set->siteValue }}"
                                style="text-decoration: none;color:white;">{{ $set->siteValue }}</a>
                        @endif
                    @endforeach
                </div>
                <div class="px-5" style="text-align: center; padding:10px 0 "> If you want to reserve table for more
                    than 4 people Please give us call a day before
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
