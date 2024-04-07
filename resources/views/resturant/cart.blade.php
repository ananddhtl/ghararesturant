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
        <h1 class="display-3 mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>
    </div>
    <!-- Page Header End -->

    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <section class="cart">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-9">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                                <h6 class="mb-0"><a href="#!" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                                </h6>
                                            </div>
                                            <hr class="my-4">
                                            @foreach ($cart as $item)
                                                <div id="{{ $item->id }}"
                                                    class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="{{ asset('uploads/' . $item->food->img) }}"
                                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <h6 class="text-muted">{{ $item->food->name }}</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <button type="button" class="btn btn-link px-2 minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown(); test(this);">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <input type="number" name="quantity"
                                                            id="quantity{{ $item->id }}" min="1" max="20"
                                                            style="width: 45px;" class="px-1 quantity-input"
                                                            value="{{ $item->quantity }}" readonly>
                                                        <button type="button" class="btn btn-link px-2 plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp(); test(this);">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0" id="price">Rs{{ $item->food->price }}</h6>
                                                        <input type="hidden" id="Price" class="price"
                                                            data-price-id="{{ $item->id }}"
                                                            value="{{ $item->food->price }}">
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 offset-lg-1 ">
                                                        <input type="text" id="finalPrice{{ $item->id }}"
                                                            class="finalPrice text-dark"
                                                            style="width: 50px; border:none; outline:none; cursor: default;"
                                                            data-price-id="{{ $item->id }}" readonly value="Rs">
                                                    </div>

                                                    <script>
                                                        var quantity = parseInt(document.getElementById("quantity{{ $item->id }}").value);
                                                        var pricePerItem = parseInt("{{ $item->food->price }}");
                                                        document.getElementById("finalPrice{{ $item->id }}").value = quantity * pricePerItem;
                                                    </script>

                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <a href="#!" class="text-muted" data-bs-toggle="modal"
                                                            data-bs-target="#modalId{{ $item->id }}"><i
                                                                class="fa-solid fa-trash-can"></i></i></a>
                                                        <div class="modal fade" id="modalId{{ $item->id }}"
                                                            tabindex="-1" data-bs-backdrop="static"
                                                            data-bs-keyboard="false" role="dialog"
                                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalTitleId">Delete ??
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form
                                                                            action="{{ route('cart.destroy', $item->id) }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            @method('delete')
                                                                            @csrf
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="submit"
                                                                                class="btn btn-danger"><i
                                                                                    class="fa-solid fa-trash-can"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-3 bg-grey">
                                        <div class="p-5 h-100">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                            <hr class="my-4">

                                            {{-- <div class="d-flex justify-content-between mb-4 ">
                                                <h5 class="text-uppercase">Discount</h5>
                                                <div class="d-flex">
                                                    <h5 class="p-1 discount">10</h5>
                                                    <h5>%</h5>
                                                </div>
                                            </div> --}}

                                            <div class="mb-4 pb-2">
                                            </div>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Total price</h5>
                                                <h5 class="mainTotal"></h5>
                                            </div>

                                           
                                                <button type="submit" class="btn btn-primary payment-button mainTotal" data-amount="{{ @$item->food->price }}">
                                                    Pay Via Khalti
                                                </button>

                                          

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function test(elem) {
            if (elem.classList.contains('minus')) {
                var quantity = parseInt(elem.nextElementSibling.value);
            } else if (elem.classList.contains('plus')) {
                var quantity = parseInt(elem.parentElement.children[1].value);
            }
            const id = elem.parentElement.parentElement.getAttribute('id');
            fetch(`{{ url('/api/cart/update') }}/${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    quantity: quantity
                }),
            }).then(res => {
                if (res.status == 200) {
                    var pricePerItem = parseInt(elem.parentElement.nextElementSibling.children[1].value);
                    elem.parentElement.nextElementSibling.nextElementSibling.children[0].value = quantity *
                        pricePerItem;
                    calculateTotal();
                }
            });
        }

        function calculateTotal() {
            const elements = document.querySelectorAll('.finalPrice');
            let sum = 0;
            elements.forEach(element => {
                sum += parseInt(element.value);
            });
            // const discount = document.getElementsByClassName('discount')[0].innerText;
            document.getElementsByClassName('mainTotal')[0].innerText = sum;
            // document.getElementsByClassName('mainTotal')[0].innerText = sum - parseInt(discount) * sum / 100;
        }

        calculateTotal();
    </script>




<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var config = {
                "publicKey": "test_public_key_28af381cd221410baf31b558b8e51d89",
                "productIdentity": "1234567890",
                "productName": "Dragon",
                "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
                "paymentPreference": [
                    "KHALTI",
                    "EBANKING",
                    "MOBILE_BANKING",
                    "CONNECT_IPS",
                    "SCT",
                ],
                "eventHandler": {
                    onSuccess(payload) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('khalti.verifyPayment') }}",
                            data: {
                                token: payload.token,
                                amount: payload.amount,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(res) {
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('khalti.storePayment') }}",
                                    data: {
                                        response: res,
                                        "_token": "{{ csrf_token() }}"
                                    },
                                    success: function(res) {
                                        console.log('transaction successful');
                                      
                                        window.location.href = "{{ url('payment-success') }}";
                                    }
                                });
                                console.log(res);
                            }
                        });
                        console.log(payload);
                    },
                    onError(error) {
                        console.log(error);
                    },
                    onClose() {
                        console.log('widget is closing');
                    }
                }
            };
    
            var checkout = new KhaltiCheckout(config);
            var paymentButtons = document.querySelectorAll(".payment-button");
            paymentButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    var amount = parseFloat(button.getAttribute("data-amount"));
                    checkout.show({
                        amount: amount * 100
                    });
                });
            });
        });
    </script>
    

@endsection
