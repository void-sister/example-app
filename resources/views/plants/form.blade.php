{{--Slug--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="slug" class=" form-control-label">Slug</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="slug" name="slug" placeholder="Enter Slug"
               value="{{ old('slug', isset($plant) ? $plant->slug : '') }}"
               aria-describedby="slugHelp"
               class="form-control @error('slug') is-invalid @enderror">
        @error('slug')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror

        <small id="slugHelp" class="form-text text-muted">Slug in english</small>
    </div>
</div>

{{--Name RU--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="name_ru" class=" form-control-label">Plant name ru</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="name_ru" name="name_ru" placeholder="Plant name ru"
               value="{{ old('name_ru', isset($plant) ? $plant->name_ru : '') }}"
               class="form-control @error('name_ru') is-invalid @enderror">
        @error('name_ru')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Name UK--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="name_uk" class=" form-control-label">Plant name uk</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="name_uk" name="name_uk" placeholder="Plant name uk"
               value="{{ old('name_uk', isset($plant) ? $plant->name_uk : '') }}"
               class="form-control @error('name_uk') is-invalid @enderror">
        @error('name_uk')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Botanical name--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="botanical_name" class=" form-control-label">Botanical name</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="botanical_name" name="botanical_name" placeholder="Botanical name"
               value="{{ old('botanical_name', isset($plant) ? $plant->botanical_name : '') }}"
               class="form-control @error('botanical_name') is-invalid @enderror">
        @error('botanical_name')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Description ru--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="description_ru" class=" form-control-label">Description ru</label>
    </div>
    <div class="col-12 col-md-9">
        <textarea name="description_ru" id="description_ru" rows="9" placeholder="Description ru"
                  class="form-control @error('description_ru') is-invalid @enderror">
            {{ old('description_ru', isset($plant) ? $plant->description_ru : '') }}
        </textarea>
        @error('description_ru')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Description uk--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="description_uk" class=" form-control-label">Description uk</label>
    </div>
    <div class="col-12 col-md-9">
        <textarea name="description_uk" id="description_uk" rows="9" placeholder="Description uk"
                  class="form-control @error('description_uk') is-invalid @enderror">
            {{ old('description_uk', isset($plant) ? $plant->description_uk : '') }}
        </textarea>
        @error('description_uk')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Care rules ru--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="care_rules_ru" class=" form-control-label">Care rules ru</label>
    </div>
    <div class="col-12 col-md-9">
        <textarea name="care_rules_ru" id="care_rules_ru" rows="9" placeholder="Care rules ru"
                  class="form-control @error('care_rules_ru') is-invalid @enderror">
            {{ old('care_rules_ru', isset($plant) ? $plant->care_rules_ru : '') }}
        </textarea>
        @error('care_rules_ru')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Care rules uk--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="care_rules_uk" class=" form-control-label">Care rules uk</label>
    </div>
    <div class="col-12 col-md-9">
        <textarea name="care_rules_uk" id="care_rules_uk" rows="9" placeholder="Care rules uk"
                  class="form-control @error('care_rules_uk') is-invalid @enderror">
            {{ old('care_rules_uk', isset($plant) ? $plant->care_rules_uk : '') }}
        </textarea>
        @error('care_rules_uk')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Indoor light--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="indoor_light" class=" form-control-label">Indoor light</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="indoor_light" id="indoor_light" class="form-control @error('indoor_light') is-invalid @enderror">
            <option>Select indoor light</option>
            @foreach(\App\Models\Plant::getIndoorLightTypes() as $key => $type)
                <option value="{{ $key }}"
                        @if(isset($plant) && $plant->indoor_light == $key) selected @endif>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @error('indoor_light')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Outdoor light--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="outdoor_light" class=" form-control-label">Outdoor light</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="outdoor_light" id="outdoor_light" class="form-control @error('outdoor_light') is-invalid @enderror">
            <option>Select outdoor light</option>
            @foreach(\App\Models\Plant::getOutdoorLightTypes() as $key => $type)
                <option value="{{ $key }}"
                        @if(isset($plant) && $plant->outdoor_light == $key) selected @endif>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @error('outdoor_light')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Air Cleaner--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="air_cleaner" class=" form-control-label">Air cleaner</label>
    </div>
    <div class="col col-md-9">
        <div class="form-check">
            <div class="checkbox">
                <input type="checkbox" @if(isset($plant) && $plant->air_cleaner == 1) checked @endif
                       id="air_cleaner" name="air_cleaner" value="" class="form-check-input">
            </div>
        </div>
    </div>
</div>

{{--Pet friendly--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="pet_friendly" class=" form-control-label">Pet friendly</label>
    </div>
    <div class="col col-md-9">
        <div class="form-check">
            <div class="checkbox">
                <input type="checkbox" @if(isset($plant) && $plant->pet_friendly == 1) checked @endif
                id="pet_friendly" name="pet_friendly" value="" class="form-check-input">
            </div>
        </div>
    </div>
</div>

{{--Difficulty--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="difficulty" class=" form-control-label">Difficulty</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="difficulty" id="difficulty" class="form-control @error('difficulty') is-invalid @enderror">
            <option>Select difficulty</option>
            @foreach(\App\Models\Plant::getDifficultyTypes() as $key => $type)
                <option value="{{ $key }}"
                        @if(isset($plant) && $plant->difficulty == $key) selected @endif>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @error('difficulty')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Height--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="height" class=" form-control-label">Height</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="number" id="height" name="height" placeholder="Height"
               value="{{ old('height', isset($plant) ? $plant->height : '') }}"
               class="form-control @error('height') is-invalid @enderror">
        @error('height')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Size--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="size" class=" form-control-label">Size</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="size" id="size" class="form-control @error('size') is-invalid @enderror">
            <option>Select size</option>
            @foreach(\App\Models\Plant::getSizes() as $key => $type)
                <option value="{{ $key }}"
                        @if(isset($plant) && $plant->size == $key) selected @endif>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @error('size')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--Pictures--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="pictures" class=" form-control-label">Pictures</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="file" id="pictures" name="pictures" multiple="" class="form-control-file">
    </div>
</div>

{{--Notes--}}
<div class="row form-group">
    <div class="col col-md-3">
        <label for="notes" class=" form-control-label">Notes</label>
    </div>
    <div class="col-12 col-md-9">
        <textarea name="notes" id="notes" rows="6" placeholder="Notes"
                  class="form-control @error('notes') is-invalid @enderror">
            {{ old('notes', isset($plant) ? $plant->notes : '') }}
        </textarea>
        @error('notes')
        <small class="error-block form-text">{{ $message }}</small>
        @enderror
    </div>
</div>
