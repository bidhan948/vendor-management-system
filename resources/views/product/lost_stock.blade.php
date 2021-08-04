@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Add Lost Stock to ') . $Product->name }}</strong> </div>
                        <div class="card-body">
                            <form action="{{ route('Product.update', $Product) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-col-form-label"
                                                for="no_of_damage">{{ __('Total Damage Product') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('no_of_damage') is-invalid @enderror"
                                                id="no_of_damage" type="number" spellcheck="false" data-ms-editor="true"
                                                name="no_of_damage" value="{{ old('no_of_damage') }}">
                                            @error('no_of_damage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-col-form-label"
                                                for="no_of_lost">{{ __('Total Lost Product') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('no_of_lost') is-invalid @enderror"
                                                id="no_of_lost" type="number" spellcheck="false" data-ms-editor="true"
                                                name="no_of_lost" value="{{ old('no_of_lost') }}">
                                            @error('no_of_lost')
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
