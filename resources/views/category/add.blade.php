@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Add Catregory') }}</strong> </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-col-form-label" for="name">{{ __('Category Name') }} <span
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
