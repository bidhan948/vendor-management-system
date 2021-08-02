@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Sell Product') }}</strong> </div>
                        <div class="card-body">
                            @if (session()->has('msg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>
                                        {{ session('msg') }}
                                    </strong>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                            @endif
                            <form action="{{ route('transction.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-col-form-label" for="user_id">{{ __('User') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <select class="form-control" id="select1" name="user_id">
                                                <option value="0">--Please select--</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-col-form-label" for="product_id">{{ __('Product') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <select class="form-control" id="select1" name="product_id">
                                                <option value="0">--Please select--</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-col-form-label"
                                                for="no_of_out_product">{{ __('Number of product') }}
                                                <span class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control" min="10" max="{{$product->max('no_of_product')}}" @error('no_of_out_product') is-invalid @enderror
                                                id="no_of_out_product" type="number" spellcheck="false"
                                                data-ms-editor="true" name="no_of_out_product">
                                            @error('no_of_out_product')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-pill btn-primary" type="submit">{{ __('Submit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
