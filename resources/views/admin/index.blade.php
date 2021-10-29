@extends('layouts.main')
@section('title', 'Dashboard')
@section('index', 'active')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend

@prepend('meta-data')

@endprepend
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>E-Commerce</strong> Dashboard</h3>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">
                                    Income
                                </h5>
                            </div>

                            <div class="col-auto">
                                <div style="font-size:20px;" class="stat text-primary">
                                    ₱
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">₱ {{ $totalIncomeToday }}</h1>
                        <div class="mb-0">
                            <span
                                class="
                                    badge badge-success-light
                                "
                            >
                                <i
                                    class="
                                        mdi
                                        mdi-arrow-bottom-right
                                    "
                                ></i>
                                Todays Income
                            </span>
                            <span class="text-muted"
                                ></span
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">
                                    Orders
                                </h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i
                                        class="align-middle"
                                        data-feather="shopping-bag"
                                    ></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $orderCount }}</h1>
                        <div class="mb-0">
                            <span
                                class="badge badge-danger-light"
                            >
                                <i
                                    class="
                                        mdi
                                        mdi-arrow-bottom-right
                                    "
                                ></i>
                                Todays Order
                            </span>
                            <span class="text-muted"
                                ></span
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">
                                    Online
                                </h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i
                                        class="align-middle"
                                        data-feather="activity"
                                    ></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">1</h1>
                        <div class="mb-0">
                            <span
                                class="
                                    badge badge-success-light
                                "
                            >
                                <i
                                    class="
                                        mdi
                                        mdi-arrow-bottom-right
                                    "
                                ></i>
                                Todays Online Customer
                            </span>
                            <span class="text-muted"
                                ></span
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">
                                    Weeks Income
                                </h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i
                                        class="align-middle"
                                        data-feather="shopping-cart"
                                    ></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">$20.120</h1>
                        <div class="mb-0">
                            <span
                                class="
                                    badge badge-success-light
                                "
                            >
                                <i
                                    class="
                                        mdi
                                        mdi-arrow-bottom-right
                                    "
                                ></i>
                                Weeks Total Income
                            </span>
                            <span class="text-muted"
                                ></span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <div class="float-end">
                            <form class="row g-2">
                                <div class="col-auto">
                                    <select
                                        class="
                                            form-select
                                            form-select-sm
                                            bg-light
                                            border-0
                                        "
                                    >
                                        <option>Jan</option>
                                        <option value="1">
                                            Feb
                                        </option>
                                        <option value="2">
                                            Mar
                                        </option>
                                        <option value="3">
                                            Apr
                                        </option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <input
                                        type="text"
                                        class="
                                            form-control
                                            form-control-sm
                                            bg-light
                                            rounded-2
                                            border-0
                                        "
                                        style="width: 100px"
                                        placeholder="Search.."
                                    />
                                </div>
                            </form>
                        </div>
                        <h5 class="card-title mb-0">
                            Total Revenue
                        </h5>
                    </div>
                    <div class="card-body pt-2 pb-3">
                        <div class="chart chart-md">
                            <canvas
                                id="chartjs-dashboard-line"
                            ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@push('page-scripts')
{{-- JS SCRIPTS HERE --}}
<script src="{{ asset('assets/js/admin-index.js') }}"></script>
@endpush
@endsection
