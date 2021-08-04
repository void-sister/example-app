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
    <label for="name_ru">Plant name ru</label>
    <input type="text" class="form-control @error('name_ru') is-invalid @enderror"
           id="name_ru" name="name_ru" value="{{ old('name_ru', isset($plant) ? $plant->name_ru : '') }}"
           placeholder="Plant name ru">

    @error('name_ru')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="name_uk">Plant name uk</label>
    <input type="text" class="form-control @error('name_uk') is-invalid @enderror"
           id="name_uk" name="name_uk" value="{{ old('name_uk', isset($plant) ? $plant->name_uk : '') }}"
           placeholder="Plant name uk">

    @error('name_uk')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="botanical_name">Botanical name</label>
    <input type="text" class="form-control @error('botanical_name') is-invalid @enderror"
           id="botanical_name" name="botanical_name" value="{{ old('botanical_name', isset($plant) ? $plant->botanical_name : '') }}"
           placeholder="Botanical name">

    @error('botanical_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="description_ru">Plant description ru</label>
    <textarea class="form-control @error('description_ru') is-invalid @enderror"
              id="description_ru" name="description_ru"
              placeholder="Plant description ru">{{ old('description_ru', isset($plant) ? $plant->description_ru : '') }}</textarea>

    @error('description_ru')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="description_uk">Plant description uk</label>
    <textarea class="form-control @error('description_uk') is-invalid @enderror"
              id="description_uk" name="description_uk"
              placeholder="Plant description uk">{{ old('description_uk', isset($plant) ? $plant->description_uk : '') }}</textarea>

    @error('description_uk')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="care_rules_ru">Care rules ru</label>
    <textarea class="form-control @error('care_rules_ru') is-invalid @enderror"
              id="care_rules_ru" name="care_rules_ru"
              placeholder="Care rules ru">{{ old('care_rules_ru', isset($plant) ? $plant->care_rules_ru : '') }}</textarea>

    @error('care_rules_ru')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="care_rules_uk">Care rules uk</label>
    <textarea class="form-control @error('care_rules_uk') is-invalid @enderror"
              id="care_rules_uk" name="care_rules_uk"
              placeholder="Care rules uk">{{ old('care_rules_uk', isset($plant) ? $plant->care_rules_uk : '') }}</textarea>

    @error('care_rules_uk')
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
