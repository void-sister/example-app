<div class="form-group mb-2">
    <label for="SKU">SKU</label>
    <input type="text" class="form-control @error('SKU') is-invalid @enderror"
           id="SKU" name="SKU" value="{{ old('SKU', isset($plant) ? $plant->SKU : '') }}"
           placeholder="Enter SKU">

    @error('SKU')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="slug">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror"
           id="slug" name="slug" value="{{ old('slug', isset($plant) ? $plant->slug : '') }}"
           aria-describedby="slugHelp" placeholder="Enter slug">

    @error('slug')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <small id="slugHelp" class="form-text text-muted">Slug in english</small>
</div>

<div class="form-group mb-2">
    <label for="plant_name">Plant name</label>
    <input type="text" class="form-control @error('plant_name') is-invalid @enderror"
           id="plant_name" name="plant_name" value="{{ old('plant_name', isset($plant) ? $plant->plant_name : '') }}"
           placeholder="Plant name">

    @error('plant_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="plant_description">Plant description</label>
    <textarea class="form-control @error('plant_description') is-invalid @enderror"
              id="plant_description" name="plant_description"
              placeholder="Plant description">{{ old('plant_description', isset($plant) ? $plant->plant_description : '') }}</textarea>

    @error('plant_description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="care_rules">Care rules</label>
    <textarea class="form-control @error('care_rules') is-invalid @enderror"
              id="care_rules" name="care_rules"
              placeholder="Care rules">{{ old('care_rules', isset($plant) ? $plant->care_rules : '') }}</textarea>

    @error('care_rules')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="size">Indoor light</label>
    <select class="form-control @error('indoor_light') is-invalid @enderror" name="indoor_light" id="indoor_light">
        <option value="">Select indoor light</option>
        @foreach(\App\Models\Plant::getIndoorLightTypes() as $key => $type)
            <option @if(isset($plant) && $plant->indoor_light == $key) selected @endif value="{{ $key }}">{{ $type }}</option>
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
        @foreach(\App\Models\Plant::getOutdoorLightTypes() as $key => $type)
            <option @if(isset($plant) && $plant->outdoor_light == $key) selected @endif value="{{ $key }}">{{ $type }}</option>
        @endforeach
    </select>

    @error('outdoor_light')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox"
           @if(isset($plant) && $plant->air_cleaner == 1) checked @endif
           value="" id="air_cleaner" name="air_cleaner">
    <label class="form-check-label" for="air_cleaner">
        Air cleaner
    </label>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox"
           @if(isset($plant) && $plant->pet_friendly == 1) checked @endif
           value="" id="pet_friendly" name="pet_friendly">
    <label class="form-check-label" for="pet_friendly">
        Pet friendly
    </label>
</div>

<div class="form-group mb-2">
    <label for="size">Difficulty</label>
    <select class="form-control @error('difficulty') is-invalid @enderror" name="difficulty" id="difficulty">
        <option value="">Select difficulty</option>
        @foreach(\App\Models\Plant::getDifficultyTypes() as $key => $type)
            <option @if(isset($plant) && $plant->difficulty == $key) selected @endif value="{{ $key }}">{{ $type }}</option>
        @endforeach
    </select>

    @error('difficulty')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="height">Height</label>
    <input type="number" class="form-control @error('height') is-invalid @enderror"
           value="{{ old('height', isset($plant) ? $plant->height : '') }}"
           id="height" name="height" placeholder="Height">

    @error('height')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="size">Size</label>
    <select class="form-control @error('size') is-invalid @enderror" name="size" id="size">
        <option value="">Select size</option>
        @foreach(\App\Models\Plant::getSizes() as $key => $size)
            <option @if(isset($plant) && $plant->size == $key) selected @endif value="{{ $key }}"> {{ $size }}</option>
        @endforeach
    </select>

    @error('size')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="price">Price</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror"
           value="{{ old('price', isset($plant) ? $plant->price : '') }}"
           id="price" name="price" placeholder="Price">

    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="discount">Discount</label>
    <input type="number" class="form-control @error('discount') is-invalid @enderror"
           value="{{ old('discount', isset($plant) ? $plant->discount : '') }}"
           id="discount" name="discount" placeholder="Discount">

    @error('discount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="units_in_stock">Units in stock</label>
    <input type="number" class="form-control @error('units_in_stock') is-invalid @enderror"
           value="{{ old('units_in_stock', isset($plant) ? $plant->units_in_stock : '') }}"
           id="units_in_stock" name="units_in_stock" placeholder="Units in stock">

    @error('units_in_stock')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox"
           @if(isset($plant) && $plant->plant_available == 1) checked @endif
           value="" id="plant_available" name="plant_available">
    <label class="form-check-label" for="plant_available">
        Plant available
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="checkbox"
           @if(isset($plant) && $plant->discount_available == 1) checked @endif
           value="" id="discount_available" name="discount_available">
    <label class="form-check-label" for="discount_available">
        Discount available
    </label>
</div>

<p>picture</p>

<div class="form-group mb-2">
    <label for="plant_description">Notes</label>
    <textarea class="form-control @error('notes') is-invalid @enderror"
              id="notes" name="notes"
              placeholder="Notes">{{ old('notes', isset($plant) ? $plant->notes : '') }}</textarea>

    @error('notes')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="d-grid mt-3">
    <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
</div>
