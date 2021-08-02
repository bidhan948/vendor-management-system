@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Add Prodcut') }}</strong> </div>
                        <div class="card-body">
                            <form action="{{ route('category.product.update', [$category, $product]) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-col-form-label" for="name">{{ __('Product Name') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                                type="text" spellcheck="false" data-ms-editor="true" name="name"
                                                value="{{ $product->name }}">
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
                                                value="{{ $product->size }}">
                                            @error('size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-col-form-label" for="color">{{ __('Product Colour') }}
                                                <span class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('color') is-invalid @enderror" id="color"
                                                type="text" spellcheck="false" data-ms-editor="true" name="color"
                                                value="{{ $product->color }}">
                                            @error('color')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label class="form-col-form-label"
                                                for="no_of_product">{{ __('Total In products') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('no_of_product') is-invalid @enderror"
                                                id="no_of_product" type="number" spellcheck="false" data-ms-editor="true"
                                                name="no_of_product" value="{{ $product->no_of_product }}">
                                            @error('no_of_product')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label class="form-col-form-label"
                                                for="no_of_damage">{{ __('Total Damage Product') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('no_of_damage') is-invalid @enderror"
                                                id="no_of_damage" type="number" spellcheck="false" data-ms-editor="true"
                                                name="no_of_damage" value="{{ $product->no_of_damage }}">
                                            @error('no_of_damage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label class="form-col-form-label"
                                                for="no_of_lost">{{ __('Total Lost Product') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('no_of_lost') is-invalid @enderror"
                                                id="no_of_lost" type="number" spellcheck="false" data-ms-editor="true"
                                                name="no_of_lost" value="{{ $product->no_of_lost }}">
                                            @error('no_of_lost')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label class="form-col-form-label" for="add_stock">{{ __('Add more Stock') }}
                                                <span class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('add_stock') is-invalid @enderror"
                                                id="add_stock" type="number" spellcheck="false" data-ms-editor="true"
                                                name="add_stock">
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
