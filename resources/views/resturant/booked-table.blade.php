@extends('layouts.main')

@section('container')
    <!--Banner -->
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="container-fluid page-header mb-5 wow fadeIn"
                style="background: url({{ asset('uploads/' . ($set->siteValue != '' ? $set->siteValue : 'hero.jpg')) }}) top right no-repeat;"
                data-wow-delay="0.1s">
        @endif
    @endforeach
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Booked table</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Booked-table</li>
            </ol>
        </nav>
    </div>
    </div>
    {{-- order Table --}}
    <div class="container ">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">reservation</h5>
            <h1 class="mb-5">Your reservation</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date and Time</th>
                        <th>Special Request</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($reservations as $reservation)
                        <tr class="table-primary">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->dateandtime }}</td>
                            <td>{{ $reservation->specialrequest }}</td>
                            <td>
                                @if ($reservation->reservation_status === 'pending')
                                    <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                                        data-bs-target="#modalId{{ $reservation->id }}">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                @elseif ($reservation->reservation_status === 'booked')
                                    <span class="btn btn-success">Booked</span>
                                @elseif ($reservation->reservation_status === 'canceled')
                                    <span class="btn btn-danger">Canceled</span>
                                @endif


                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId{{ $reservation->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">Delete ??
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure You want to cancel
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('reservation.cancel', $reservation->id) }}"
                                                    class="btn btn-danger">Yes</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                    aria-label="Close">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Optional: Place to the bottom of scripts -->
                                <script>
                                    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date and Time</th>
                    <th>Special Request</th>

                    <th>Action</th>
                </tfoot>
            </table>
        </div>

    </div>
    {{-- order Table --}}
@endsection
