@extends('layouts.app')

@section('title', 'Edit product')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <form method="POST" action="{{ route('products.update', ['slug' => $product->slug]) }}">
            @method('PUT')
            @csrf
            <div class="form-group mb-2">
                <label for="SKU">SKU</label>
                <input type="text" class="form-control @error('SKU') is-invalid @enderror"
                       id="SKU" name="SKU" value="{{ $product->SKU }}"
                       placeholder="Enter SKU">

                @error('SKU')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                       id="slug" name="slug" value="{{ $product->slug }}"
                       aria-describedby="slugHelp" placeholder="Enter slug">

                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <small id="slugHelp" class="form-text text-muted">Slug in english</small>
            </div>

            <div class="form-group mb-2">
                <label for="product_name">Product name</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                       id="product_name" name="product_name" value="{{ $product->product_name }}"
                       placeholder="Product name">

                @error('product_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="product_description">Product description</label>
                <textarea class="form-control @error('product_description') is-invalid @enderror"
                          id="product_description" name="product_description"
                          placeholder="Product description">{{ $product->product_description }}</textarea>

                @error('product_description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="care_rules">Care rules</label>
                <textarea class="form-control @error('care_rules') is-invalid @enderror"
                          id="care_rules" name="care_rules"
                          placeholder="Care rules">{{ $product->care_rules }}</textarea>

                @error('care_rules')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="height">Height</label>
                <input type="number" class="form-control @error('height') is-invalid @enderror"
                       id="height" name="height" value="{{ $product->height }}"
                       placeholder="Height">

                @error('height')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price" value="{{ $product->price }}"
                       placeholder="Price">

                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="discount">Discount</label>
                <input type="number" class="form-control @error('discount') is-invalid @enderror"
                       id="discount" name="discount" value="{{ $product->discount }}"
                       placeholder="Discount">

                @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="units_in_stock">Units in stock</label>
                <input type="number" class="form-control @error('units_in_stock') is-invalid @enderror"
                       id="units_in_stock" name="units_in_stock" value="{{ $product->units_in_stock }}"
                       placeholder="Units in stock">

                @error('units_in_stock')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="units_on_order">Units on order</label>
                <input type="number" class="form-control @error('units_on_order') is-invalid @enderror"
                       id="units_on_order" name="units_on_order" value="{{ $product->units_on_order }}"
                       placeholder="Units on order">

                @error('units_on_order')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=""
                       id="product_available" name="product_available"
                       @if($product->product_available) checked @endif>
                <label class="form-check-label" for="product_available">
                    Product available
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=""
                       id="discount_available" name="discount_available"
                       @if($product->discount_available) checked @endif>
                <label class="form-check-label" for="discount_available">
                    Discount available
                </label>
            </div>

            <p>picture</p>
            <p>notes</p>

            <div class="d-grid mt-3">
                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </div>
        </form>
    </div>
@endsection
