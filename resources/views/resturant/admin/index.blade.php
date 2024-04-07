@extends('resturant.admin.inc.main')
@section('main-container')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Welcome to the Dashboard</h5>
                                    @if ($files > 0)
                                        <p class="mb-4">
                                            There are {{ $files }} files.
                                        </p>
                                    @else
                                        <p class="mb-4">
                                            Please add Image in File manager so You can use image.
                                        </p>
                                    @endif

                                    <a href="{{ route('fileManager.index') }}" class="btn btn-sm btn-outline-primary">Add
                                        Image</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-4 px-0">
                                    @foreach ($settings as $set)
                                        @if ($set->siteKey == 'Logo')
                                            <img src="{{ asset('uploads/' . ($set->siteValue != '' ? $set->siteValue : 'buff-momo-1.png')) }}"
                                                height="140" alt="Logo" />
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="{{ route('orders.index') }}">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Orders</span>
                                    <h3 class="card-title mb-2">{{ $order }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                <a class="dropdown-item" href="{{ route('reservation.index') }}">View
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span>Reservation</span>
                                    <h3 class="card-title text-nowrap mb-1">{{ $reservation }}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <div class="col-md-12">
                                <h5 class="card-header m-0 me-2 pb-3">Total Money Recived</h5>
                                <table
                                    class="table table-striped overflow-hidden table-hover table-bordered table-lg table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.N</th>
                                            <th scope="col">Orderer Name</th>
                                            <th scope="col">Food_name</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    @if ($payment->user)
                                                        {{ $payment->user->name }}
                                                    @else
                                                        No User
                                                    @endif
                                                </td>
                                                <td>{{ $payment->foods->name }}</td>
                                                <td>{{ $payment->amount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-center">Total Amount</td>
                                            <td>{{ $totalAmount }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="fa fa-inbox" aria-hidden="true"></i>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="d-block mb-1">NewsLetter</span>
                                    <h3 class="card-title text-nowrap mb-2">{{ $newsletter }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Total Transaction</span>
                                    <h3 class="card-title mb-2">{{ $totalAmount }}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Content -->
    @endsection
