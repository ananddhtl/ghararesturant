@extends('layouts.main')

@section('container')
    <!--Banner -->
    <!-- Page Header Start -->
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="container-fluid page-header mb-5 wow fadeIn"
                style="background: url({{ asset('uploads/' . ($set->siteValue != '' ? $set->siteValue : 'hero.jpg')) }}) top right no-repeat;"
                data-wow-delay="0.1s">
        @endif
    @endforeach
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Orders</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">orders</li>
            </ol>
        </nav>
    </div>
    </div>
    <!-- Page Header End -->
    {{-- order Table --}}
    <div class="container ">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Orders</h5>
            <h1 class="mb-5">Your Orders</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Food Name</th>
                        <th>Food Quantity</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Food Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $order)
                        <tr class="table-primary">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $order->foods->name }}</td>
                            <td>{{ $order->quantity }}</td> 
                            <td>{{ $order->price_per_item}}</td> 
                            <td>{{ $order->esewa_status }}</td>
                            <td>{{ $order->food_status }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
    {{-- order Table --}}
@endsection
