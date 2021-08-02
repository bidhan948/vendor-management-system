@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Add Category') }}</strong> </div>
                        <div class="card-body">
                            @if (session()->has('msg_category'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>
                                        {{ session('msg_category') }}
                                    </strong>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                            @endif
                            <form action="{{ route('category.update', $category) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-col-form-label" for="name">{{ __('Category Name') }} <span
                                                    class="text-danger"><b>*</b></span> </label>
                                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                                type="text" spellcheck="false" data-ms-editor="true" name="name"
                                                value="{{ $category->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-pill btn-primary" type="submit">{{ __('Update') }}</button>
                            </form>
                        </div>
                        <form action="{{ route('category.destroy', $category) }}" class="d-inline" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Are you Sure you want to delete this Checklist Group?')">
                                    {{ __('Delete this Checklist Group') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Add Product') }}</strong> </div>
                        <div class="card-body">
                            <a class="btn btn-primary mb-3" href="{{ route('category.product.create', $category) }}">
                                <i class="fas fa-plus"></i><span class="px-1">{{ __('Add Product') }}</span></a>
                            @if (session()->has('msg_product'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>
                                        {{ session('msg_product') }}
                                    </strong>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                            @endif
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">Product Table</div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.no</th>
                                                    <th class="text-center">{{ __('Products Name') }}</th>
                                                    <th class="text-center">{{ __('Size') }}</th>
                                                    <th class="text-center">{{ __('color') }}</th>
                                                    <th class="text-center">{{ __('Current Stock') }}</th>
                                                    <th class="text-center" colspan="2">{{ __('Status') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @forelse($category->products as $product)
                                                    <tr>
                                                        <td class="text-center">{{ $i++ }}</td>
                                                        <td class="text-center">{{ $product->name }}</td>
                                                        <td class="text-center">{{ $product->size }}</td>
                                                        <td class="text-center">{{ $product->color }}</td>
                                                        <td class="text-center">{{ $product->no_of_product }}</td>
                                                        <td class=" text-center"><a
                                                                href="{{ route('category.product.edit', [$category, $product]) }}"
                                                                class="btn btn-success">{{ __('Edit') }}</a></td>
                                                        <td class="text-center"><a class="btn btn-danger text-white"
                                                                onclick="event.preventDefault();
                                                                                document.getElementById('delete_product{{ $i }}').submit();">{{ __('Delete') }}</a>
                                                        </td>
                                                    </tr>
                                                    <form id="delete_product{{ $i }}"
                                                        action="{{ route('category.product.destroy', [$category, $product]) }}"
                                                        method="POST" class="d-none">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                @empty
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert"><strong>
                                                            {{ __('No product list in the record :(') }}
                                                            <button class="close" type="button" data-dismiss="alert"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">×</span></button>
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
