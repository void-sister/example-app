@extends('layouts.app')

@section('title', 'Create product')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group mb-2">
                <label for="SKU">SKU</label>
                <input type="text" class="form-control @error('SKU') is-invalid @enderror"
                       id="SKU" name="SKU" placeholder="Enter SKU">

                @error('SKU')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                       id="slug" name="slug"
                       aria-describedby="slugHelp" placeholder="Enter slug">

                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <small id="slugHelp" class="form-text text-muted">Slug in english</small>
            </div>

            <div class="form-group mb-2">
                <label for="product_name">Product name</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                       id="product_name" name="product_name" placeholder="Product name">

                @error('product_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="product_description">Product description</label>
                <textarea class="form-control @error('product_description') is-invalid @enderror"
                          id="product_description" name="product_description" placeholder="Product description"></textarea>

                @error('product_description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="care_rules">Care rules</label>
                <textarea class="form-control @error('care_rules') is-invalid @enderror"
                          id="care_rules" name="care_rules" placeholder="Care rules"></textarea>

                @error('care_rules')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="size">Indoor light</label>
                <select class="form-control @error('indoor_light') is-invalid @enderror" name="indoor_light" id="indoor_light">
                    <option value=""> Select indoor light </option>
                    @foreach(\App\Models\Product::getIndoorLightTypes() as $key => $type)
                        <option value="{{ $key }}"> {{ $type }}</option>
                    @endforeach
                </select>

                @error('indoor_light')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="size">Outdoor light</label>
                <select class="form-control @error('outdoor_light') is-invalid @enderror" name="outdoor_light" id="outdoor_light">
                    <option value=""> Select outdoor light </option>
                    @foreach(\App\Models\Product::getOutdoorLightTypes() as $key => $type)
                        <option value="{{ $key }}"> {{ $type }}</option>
                    @endforeach
                </select>

                @error('outdoor_light')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="air_cleaner" name="air_cleaner">
                <label class="form-check-label" for="air_cleaner">
                    Air cleaner
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="pet_friendly" name="pet_friendly">
                <label class="form-check-label" for="pet_friendly">
                    Pet friendly
                </label>
            </div>

            <div class="form-group mb-2">
                <label for="size">Difficulty</label>
                <select class="form-control @error('difficulty') is-invalid @enderror" name="difficulty" id="difficulty">
                    <option value=""> Select difficulty </option>
                    @foreach(\App\Models\Product::getDifficultyTypes() as $key => $type)
                        <option value="{{ $key }}"> {{ $type }}</option>
                    @endforeach
                </select>

                @error('difficulty')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="height">Height</label>
                <input type="number" class="form-control @error('height') is-invalid @enderror"
                       id="height" name="height" placeholder="Height">

                @error('height')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="size">Size</label>
                <select class="form-control @error('size') is-invalid @enderror" name="size" id="size">
                    <option value=""> Select </option>
                    @foreach(\App\Models\Product::getSizes() as $key => $size)
                        <option value="{{ $key }}"> {{ $size }}</option>
                    @endforeach
                </select>

                @error('size')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price" placeholder="Price">

                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="discount">Discount</label>
                <input type="number" class="form-control @error('discount') is-invalid @enderror"
                       id="discount" name="discount" placeholder="Discount">

                @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="units_in_stock">Units in stock</label>
                <input type="number" class="form-control @error('units_in_stock') is-invalid @enderror"
                       id="units_in_stock" name="units_in_stock" placeholder="Units in stock">

                @error('units_in_stock')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="units_on_order">Units on order</label>
                <input type="number" class="form-control @error('units_on_order') is-invalid @enderror"
                       id="units_on_order" name="units_on_order" placeholder="Units on order">

                @error('units_on_order')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="product_available" name="product_available" checked>
                <label class="form-check-label" for="product_available">
                    Product available
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="discount_available" name="discount_available">
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
