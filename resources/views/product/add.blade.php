@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Add Prodcut') }}</strong> </div>
                        <div class="card-body">
                            <form action="{{ route('category.product.store',$category) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-col-form-label" for="name">{{ __('Product Name') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                                type="text" spellcheck="false" data-ms-editor="true" name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-col-form-label" for="size">{{ __('Product Size') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('size') is-invalid @enderror" id="size"
                                                type="text" spellcheck="false" data-ms-editor="true" name="size"
                                                value="{{ old('size') }}">
                                            @error('size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-col-form-label" for="color">{{ __('Product Colour') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('color') is-invalid @enderror" id="color"
                                                type="text" spellcheck="false" data-ms-editor="true" name="color"
                                                value="{{ old('color') }}">
                                            @error('color')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-col-form-label" for="no_of_product">{{ __('Total In products') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('no_of_product') is-invalid @enderror" id="no_of_product"
                                                type="number" spellcheck="false" data-ms-editor="true" name="no_of_product"
                                                value="{{ old('no_of_product') }}">
                                            @error('no_of_product')
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
    </div>
@endsection
