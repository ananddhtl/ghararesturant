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
        <h1 class="display-3 mb-3 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">About Us</li>
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


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-end">
                {!! QrCode::size(200)->generate(route('qr-page')) !!}
            </div>
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">MENU</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#tab-1">Breakfast</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Lunch </a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Dinner</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-4">Drinks</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-5">Desert</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @forelse ($breakfast as $food)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ asset('uploads/' . $food->img) }}"
                                            alt="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $food->id }}">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $food->id }}">{{ $food->name }}</a>
                                        <span class="text-primary me-1">Rs{{ $food->price }}</span>

                                        <form action="{{ route('cart.store') }}" method="POST"
                                            enctype="multipart/form-data" class="text-center">
                                            @csrf
                                            <input type="text" name="user_id" value="{{ $user_id }}" readonly
                                                hidden>
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" name="quantity" min="1" max="20"
                                                style="width: 40px" value="1">
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <input type="number" name="food_id" value="{{ $food->id }}" readonly
                                                style="display: none;">
                                            <button type="submit" class="btn btn-light text-body" title="Add to cart"><i
                                                    class="fa-solid fa-cart-shopping"></i>Add to
                                                cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalId{{ $food->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">About {{ $food->name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6"><img class="img-fluid w-100"
                                                        src="{{ asset('uploads/' . $food->img) }}" alt=""></div>
                                                <div class="col-6">
                                                    <div class="border border-primary p-2 rounded-3">
                                                        <h3>Name: <span>{{ $food->name }} </span></h3>
                                                        <h3>Type: <span>{{ $food->type }} </span></h3>
                                                        <h3>Price: <span>{{ $food->price }} </span></h3>
                                                    </div>
                                                    <div>
                                                        <p class=" text-justify fs-5 text-dark">{{ $food->description }}
                                                        </p>
                                                        <p class="text-justify fs-5 text-dark">
                                                            {{ $food->sub_description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('cart.store') }}" method="POST"
                                                enctype="multipart/form-data" class="text-center">
                                                @csrf
                                                <input type="text" name="user_id" value="{{ $user_id }}"
                                                    readonly hidden>
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input type="number" name="quantity" min="1" max="20"
                                                    style="width: 40px" value="1">
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <input type="number" name="food_id" value="{{ $food->id }}"
                                                    readonly style="display: none;">
                                                <button type="submit" class="btn btn-light text-body"
                                                    title="Add to cart"><i class="fa-solid fa-cart-shopping"></i>Add to
                                                    cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No data found for this genre
                        @endforelse
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @forelse ($lunch as $food)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ asset('uploads/' . $food->img) }}"
                                            alt="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $food->id }}">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $food->id }}">{{ $food->name }}</a>
                                        <span class="text-primary me-1">Rs{{ $food->price }}</span>

                                        <form action="{{ route('cart.store') }}" method="POST"
                                            enctype="multipart/form-data" class="text-center">
                                            @csrf
                                            <input type="text" name="user_id" value="{{ $user_id }}" readonly
                                                hidden>
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" name="quantity" min="1" max="20"
                                                style="width: 40px" value="1">
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <input type="number" name="food_id" value="{{ $food->id }}" readonly
                                                style="display: none;">
                                            <button type="submit" class="btn btn-light text-body" title="Add to cart"><i
                                                    class="fa-solid fa-cart-shopping"></i>Add to
                                                cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalId{{ $food->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">About {{ $food->name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6"><img class="img-fluid w-100"
                                                        src="{{ asset('uploads/' . $food->img) }}" alt=""></div>
                                                <div class="col-6">
                                                    <div class="border border-primary p-2 rounded-3">
                                                        <h3>Name: <span>{{ $food->name }} </span></h3>
                                                        <h3>Type: <span>{{ $food->type }} </span></h3>
                                                        <h3>Price: <span>{{ $food->price }} </span></h3>
                                                    </div>
                                                    <div>
                                                        <p class=" text-justify fs-5 text-dark">{{ $food->description }}
                                                        </p>
                                                        <p class="text-justify fs-5 text-dark">
                                                            {{ $food->sub_description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('cart.store') }}" method="POST"
                                                enctype="multipart/form-data" class="text-center">
                                                @csrf
                                                <input type="text" name="user_id" value="{{ $user_id }}"
                                                    readonly hidden>
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input type="number" name="quantity" min="1" max="20"
                                                    style="width: 40px" value="1">
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <input type="number" name="food_id" value="{{ $food->id }}"
                                                    readonly style="display: none;">
                                                <button type="submit" class="btn btn-light text-body"
                                                    title="Add to cart"><i class="fa-solid fa-cart-shopping"></i>Add to
                                                    cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No data found for this genre
                        @endforelse
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @forelse ($dinner as $food)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ asset('uploads/' . $food->img) }}"
                                            alt="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $food->id }}">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $food->id }}">{{ $food->name }}</a>
                                        <span class="text-primary me-1">Rs{{ $food->price }}</span>

                                        <form action="{{ route('cart.store') }}" method="POST"
                                            enctype="multipart/form-data" class="text-center">
                                            @csrf
                                            <input type="text" name="user_id" value="{{ $user_id }}" readonly
                                                hidden>
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" name="quantity" min="1" max="20"
                                                style="width: 40px" value="1">
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <input type="number" name="food_id" value="{{ $food->id }}" readonly
                                                style="display: none;">
                                            <button type="submit" class="btn btn-light text-body" title="Add to cart"><i
                                                    class="fa-solid fa-cart-shopping"></i>Add to
                                                cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalId{{ $food->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">About {{ $food->name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6"><img class="img-fluid w-100"
                                                        src="{{ asset('uploads/' . $food->img) }}" alt=""></div>
                                                <div class="col-6">
                                                    <div class="border border-primary p-2 rounded-3">
                                                        <h3>Name: <span>{{ $food->name }} </span></h3>
                                                        <h3>Type: <span>{{ $food->type }} </span></h3>
                                                        <h3>Price: <span>{{ $food->price }} </span></h3>
                                                    </div>
                                                    <div>
                                                        <p class=" text-justify fs-5 text-dark">{{ $food->description }}
                                                        </p>
                                                        <p class="text-justify fs-5 text-dark">
                                                            {{ $food->sub_description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('cart.store') }}" method="POST"
                                                enctype="multipart/form-data" class="text-center">
                                                @csrf
                                                <input type="text" name="user_id" value="{{ $user_id }}"
                                                    readonly hidden>
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input type="number" name="quantity" min="1" max="20"
                                                    style="width: 40px" value="1">
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <input type="number" name="food_id" value="{{ $food->id }}"
                                                    readonly style="display: none;">
                                                <button type="submit" class="btn btn-light text-body"
                                                    title="Add to cart"><i class="fa-solid fa-cart-shopping"></i>Add to
                                                    cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No data found for this genre
                        @endforelse
                    </div>
                </div>
                <div id="tab-4" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @forelse ($drinks as $food)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ asset('uploads/' . $food->img) }}"
                                            alt="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $food->id }}">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $food->id }}">{{ $food->name }}</a>
                                        <span class="text-primary me-1">Rs{{ $food->price }}</span>

                                        <form action="{{ route('cart.store') }}" method="POST"
                                            enctype="multipart/form-data" class="text-center">
                                            @csrf
                                            <input type="text" name="user_id" value="{{ $user_id }}" readonly
                                                hidden>
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" name="quantity" min="1" max="20"
                                                style="width: 40px" value="1">
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <input type="number" name="food_id" value="{{ $food->id }}" readonly
                                                style="display: none;">
                                            <button type="submit" class="btn btn-light text-body" title="Add to cart"><i
                                                    class="fa-solid fa-cart-shopping"></i>Add to
                                                cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalId{{ $food->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">About {{ $food->name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6"><img class="img-fluid w-100"
                                                        src="{{ asset('uploads/' . $food->img) }}" alt=""></div>
                                                <div class="col-6">
                                                    <div class="border border-primary p-2 rounded-3">
                                                        <h3>Name: <span>{{ $food->name }} </span></h3>
                                                        <h3>Type: <span>{{ $food->type }} </span></h3>
                                                        <h3>Price: <span>{{ $food->price }} </span></h3>
                                                    </div>
                                                    <div>
                                                        <p class=" text-justify fs-5 text-dark">{{ $food->description }}
                                                        </p>
                                                        <p class="text-justify fs-5 text-dark">
                                                            {{ $food->sub_description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('cart.store') }}" method="POST"
                                                enctype="multipart/form-data" class="text-center">
                                                @csrf
                                                <input type="text" name="user_id" value="{{ $user_id }}"
                                                    readonly hidden>
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input type="number" name="quantity" min="1" max="20"
                                                    style="width: 40px" value="1">
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <input type="number" name="food_id" value="{{ $food->id }}"
                                                    readonly style="display: none;">
                                                <button type="submit" class="btn btn-light text-body"
                                                    title="Add to cart"><i class="fa-solid fa-cart-shopping"></i>Add to
                                                    cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No data found for this genre
                        @endforelse
                    </div>
                </div>
                <div id="tab-5" class="tab-pane fade show p-0">
                    @forelse ($desert as $food)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('uploads/' . $food->img) }}"
                                        alt="" data-bs-toggle="modal"
                                        data-bs-target="#modalId{{ $food->id }}">
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="" data-bs-toggle="modal"
                                        data-bs-target="#modalId{{ $food->id }}">{{ $food->name }}</a>
                                    <span class="text-primary me-1">Rs{{ $food->price }}</span>

                                    <form action="{{ route('cart.store') }}" method="POST"
                                        enctype="multipart/form-data" class="text-center">
                                        @csrf
                                        <input type="text" name="user_id" value="{{ $user_id }}" readonly
                                            hidden>
                                        <button type="button" class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="number" name="quantity" min="1" max="20"
                                            style="width: 40px" value="1">
                                        <button type="button" class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <input type="number" name="food_id" value="{{ $food->id }}" readonly
                                            style="display: none;">
                                        <button type="submit" class="btn btn-light text-body" title="Add to cart"><i
                                                class="fa-solid fa-cart-shopping"></i>Add to
                                            cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalId{{ $food->id }}" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">About {{ $food->name }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6"><img class="img-fluid w-100"
                                                    src="{{ asset('uploads/' . $food->img) }}" alt=""></div>
                                            <div class="col-6">
                                                <div class="border border-primary p-2 rounded-3">
                                                    <h3>Name: <span>{{ $food->name }} </span></h3>
                                                    <h3>Type: <span>{{ $food->type }} </span></h3>
                                                    <h3>Price: <span>{{ $food->price }} </span></h3>
                                                </div>
                                                <div>
                                                    <p class=" text-justify fs-5 text-dark">{{ $food->description }}
                                                    </p>
                                                    <p class="text-justify fs-5 text-dark">
                                                        {{ $food->sub_description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('cart.store') }}" method="POST"
                                            enctype="multipart/form-data" class="text-center">
                                            @csrf
                                            <input type="text" name="user_id" value="{{ $user_id }}" readonly
                                                hidden>
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" name="quantity" min="1" max="20"
                                                style="width: 40px" value="1">
                                            <button type="button" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <input type="number" name="food_id" value="{{ $food->id }}" readonly
                                                style="display: none;">
                                            <button type="submit" class="btn btn-light text-body" title="Add to cart"><i
                                                    class="fa-solid fa-cart-shopping"></i>Add to
                                                cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        No data found for this genre
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->


    <!-- Team Start -->
    @if (count($teams))
        <div class="container-fluid bg-light bg-icon py-6">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
                    <h1 class="mb-5">Our Master Chefs</h1>
                </div>
                <div class="row g-4">
                    @foreach ($teams as $team)
                        <div class="col-lg-3 col-md-6 wow fadeInUp  rounded " data-wow-delay="0.1s"
                            style="border-radius: 25px">
                            <div class="team-item text-center rounded bg-white overflow-hidden">
                                <div class="rounded overflow-hidden m-4">
                                    <img class="img-fluid rounded" src="{{ asset('uploads/' . $team->img) }}"
                                        alt="" data-bs-toggle="modal"
                                        data-bs-target="#teamID{{ $team->id }}"
                                        style="cursor: pointer;
                                height:10rem;">
                                </div>
                                <h5 class="mb-0" data-bs-toggle="modal" data-bs-target="#teamID{{ $team->id }}"
                                    style="cursor: pointer">{{ $team->name }}</h5>
                                <small>{{ $team->post }}</small>
                                <div class="d-flex justify-content-center mt-3">
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $team->facebook }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $team->twitter }}"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $team->instagram }}"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="teamID{{ $team->id }}" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">About {{ $team->name }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6"><img class="img-fluid w-100"
                                                    src="{{ asset('uploads/' . $team->img) }}" alt=""></div>
                                            <div class="col-6">
                                                <div class="border border-primary p-2 rounded-3">
                                                    <h3>Name: <span>{{ $team->name }} </span></h3>
                                                    <h3>Qualification: <span>{{ $team->qualification }} </span></h3>
                                                    <h3>Post: <span>{{ $team->post }} </span></h3>
                                                </div>
                                                <div>
                                                    <p class=" text-justify fs-5 text-dark">{{ $team->description }}</p>
                                                    <p class="text-justify fs-5 text-dark">{{ $team->sub_description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Team End -->
@endsection
