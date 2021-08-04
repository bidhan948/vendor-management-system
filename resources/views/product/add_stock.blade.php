@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Add Lost Stock to ') . $Product->name }}</strong> </div>
                        <div class="card-body">
                            <form action="{{ route('Product.destroy', $Product) }}" method="post">
                                @method('Delete')
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-col-form-label"
                                                for="no_of_in_product">{{ __('Total no of stock') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('no_of_in_product') is-invalid @enderror"
                                                id="no_of_in_product" type="number" spellcheck="false" data-ms-editor="true"
                                                name="no_of_in_product" value="{{ old('no_of_in_product') }}">
                                            @error('no_of_in_product')
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
