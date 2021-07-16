<div class="form-group mb-2">
    <label for="SKU">SKU</label>
    <input type="text" class="form-control @error('SKU') is-invalid @enderror"
           id="SKU" name="SKU" value="{{ old('SKU', isset($product) ? $product->SKU : '') }}"
           placeholder="Enter SKU">

    @error('SKU')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="slug">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror"
           id="slug" name="slug" value="{{ old('slug', isset($product) ? $product->slug : '') }}"
           aria-describedby="slugHelp" placeholder="Enter slug">

    @error('slug')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <small id="slugHelp" class="form-text text-muted">Slug in english</small>
</div>

<div class="form-group mb-2">
    <label for="product_name">Product name</label>
    <input type="text" class="form-control @error('product_name') is-invalid @enderror"
           id="product_name" name="product_name" value="{{ old('product_name', isset($product) ? $product->product_name : '') }}"
           placeholder="Product name">

    @error('product_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="product_description">Product description</label>
    <textarea class="form-control @error('product_description') is-invalid @enderror"
              id="product_description" name="product_description"
              placeholder="Product description">{{ old('product_description', isset($product) ? $product->product_description : '') }}</textarea>

    @error('product_description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="care_rules">Care rules</label>
    <textarea class="form-control @error('care_rules') is-invalid @enderror"
              id="care_rules" name="care_rules"
              placeholder="Care rules">{{ old('care_rules', isset($product) ? $product->care_rules : '') }}</textarea>

    @error('care_rules')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="size">Indoor light</label>
    <select class="form-control @error('indoor_light') is-invalid @enderror" name="indoor_light" id="indoor_light">
        <option value="">Select indoor light</option>
        @foreach(\App\Models\Product::getIndoorLightTypes() as $key => $type)
            <option @if(isset($product) && $product->indoor_light == $key) selected @endif value="{{ $key }}">{{ $type }}</option>
        @endforeach
    </select>

    @error('indoor_light')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="size">Outdoor light</label>
    <select class="form-control @error('outdoor_light') is-invalid @enderror" name="outdoor_light" id="outdoor_light">
        <option value="">Select outdoor light</option>
        @foreach(\App\Models\Product::getOutdoorLightTypes() as $key => $type)
            <option @if(isset($product) && $product->outdoor_light == $key) selected @endif value="{{ $key }}">{{ $type }}</option>
        @endforeach
    </select>

    @error('outdoor_light')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox"
           @if(isset($product) && $product->air_cleaner == 1) checked @endif
           value="" id="air_cleaner" name="air_cleaner">
    <label class="form-check-label" for="air_cleaner">
        Air cleaner
    </label>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox"
           @if(isset($product) && $product->pet_friendly == 1) checked @endif
           value="" id="pet_friendly" name="pet_friendly">
    <label class="form-check-label" for="pet_friendly">
        Pet friendly
    </label>
</div>

<div class="form-group mb-2">
    <label for="size">Difficulty</label>
    <select class="form-control @error('difficulty') is-invalid @enderror" name="difficulty" id="difficulty">
        <option value="">Select difficulty</option>
        @foreach(\App\Models\Product::getDifficultyTypes() as $key => $type)
            <option @if(isset($product) && $product->difficulty == $key) selected @endif value="{{ $key }}">{{ $type }}</option>
        @endforeach
    </select>

    @error('difficulty')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="height">Height</label>
    <input type="number" class="form-control @error('height') is-invalid @enderror"
           value="{{ old('height', isset($product) ? $product->height : '') }}"
           id="height" name="height" placeholder="Height">

    @error('height')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="size">Size</label>
    <select class="form-control @error('size') is-invalid @enderror" name="size" id="size">
        <option value="">Select size</option>
        @foreach(\App\Models\Product::getSizes() as $key => $size)
            <option @if(isset($product) && $product->size == $key) selected @endif value="{{ $key }}"> {{ $size }}</option>
        @endforeach
    </select>

    @error('size')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="price">Price</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror"
           value="{{ old('price', isset($product) ? $product->price : '') }}"
           id="price" name="price" placeholder="Price">

    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="discount">Discount</label>
    <input type="number" class="form-control @error('discount') is-invalid @enderror"
           value="{{ old('discount', isset($product) ? $product->discount : '') }}"
           id="discount" name="discount" placeholder="Discount">

    @error('discount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="units_in_stock">Units in stock</label>
    <input type="number" class="form-control @error('units_in_stock') is-invalid @enderror"
           value="{{ old('units_in_stock', isset($product) ? $product->units_in_stock : '') }}"
           id="units_in_stock" name="units_in_stock" placeholder="Units in stock">

    @error('units_in_stock')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox"
           @if(isset($product) && $product->product_available == 1) checked @endif
           value="" id="product_available" name="product_available">
    <label class="form-check-label" for="product_available">
        Product available
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="checkbox"
           @if(isset($product) && $product->discount_available == 1) checked @endif
           value="" id="discount_available" name="discount_available">
    <label class="form-check-label" for="discount_available">
        Discount available
    </label>
</div>

<p>picture</p>

<div class="form-group mb-2">
    <label for="product_description">Notes</label>
    <textarea class="form-control @error('notes') is-invalid @enderror"
              id="notes" name="notes"
              placeholder="Notes">{{ old('notes', isset($product) ? $product->notes : '') }}</textarea>

    @error('notes')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="d-grid mt-3">
    <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
</div>
