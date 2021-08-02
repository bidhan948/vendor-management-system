@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Transction Report') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (auth()->user()->is_admin)

                            <div class="col-sm-6 col-lg-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="py-1 font-weight-bold">Total Sold Product</div>
                                        <div class="text-value-lg py-1">
                                            @php
                                                $sold_percent = ($transctions->sum('no_of_out_product') / $products->sum('no_of_product')) * 100;
                                            @endphp
                                            {{ number_format((float) $sold_percent, 2, '.', '') }} %
                                        </div>
                                        <div class="progress progress-xs my-2">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ $sold_percent }}%" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6 mx-3 col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-2xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-basket"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">{{ $transctions->sum('no_of_out_product') }}</div>
                                            <small class="text-muted text-uppercase font-weight-bold">Products sold</small>
                                            <div class="progress progress-xs mt-3 mb-0">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: {{ $sold_percent }}%" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-3 col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-2xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-basket"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">{{ $products->sum('no_of_product') }}</div><small
                                                class="text-muted text-uppercase font-weight-bold">Products remain</small>
                                            <div class="progress progress-xs mt-3 mb-0">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: {{ $sold_percent }}%" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-3 col-md-2">
                                    <div class="card text-white bg-danger">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-2xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">{{ $products->sum('no_of_damage') }}</div><small
                                                class="text-muted text-uppercase font-weight-bold">Total Damage</small>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ ($products->sum('no_of_damage') / $products->sum('no_of_product')) * 100 }}%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-3 col-md-2">
                                    <div class="card text-white bg-danger">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-2xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">{{ $products->sum('no_of_lost') }}</div><small
                                                class="text-muted text-uppercase font-weight-bold">Total Lost</small>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ ($products->sum('no_of_lost') / $products->sum('no_of_product')) * 100 }}%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-3 col-md-2">
                                    <div class="card text-white bg-danger">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-2xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">
                                                {{ $products->sum('no_of_lost') + $products->sum('no_of_damage') }}</div>
                                            <small class="text-muted text-uppercase font-weight-bold">Total Loss</small>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ (($products->sum('no_of_lost') + $products->sum('no_of_damage')) / $products->sum('no_of_product')) * 100 }}%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-6">
                                    <div class="c-callout c-callout-success"><small class="text-muted">Total Product
                                            Brought</small>
                                        <div class="text-value-lg">
                                            {{ $transctions->where('user_id', auth()->user()->id)->sum('no_of_out_product') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="c-callout c-callout-success"><small class="text-muted">Total Product
                                            Brought today</small>
                                        <div class="text-value-lg">
                                            {{ (new App\Services\ProductServices())->userToday($transctions) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Purchase Report</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.no</th>
                                        <th class="text-center">Name of Product</th>
                                        <th class="text-center">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1
                                    @endphp
                                    @dd($transctions)
                                    @foreach ($transctions->where('user_id', auth()->user()->id)->values() as $transction)
                                        <tr>
                                            <td class="text-center">{{$i++}}</td>
                                            <td class="text-center">{{$transction->}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
