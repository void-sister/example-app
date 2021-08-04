@extends('layouts.app')

@section('title', 'Plant show')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <p>slug: {{ $plant->slug }}</p>
        <p>plant_name: {{ $plant->name_ru }}</p>
        <p>plant_description: {{ $plant->description_ru }}</p>
        <p>care_rules: {{ $plant->care_rules_ru }}</p>
        <p>height: {{ $plant->height }}</p>
        <p>is_archived: {{ $plant->is_archived }}</p>

        @if(!$plant->is_archived)
            <form method="POST" action="{{ route('plants.archive', ['slug' => $plant->slug]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="send" value="Archive" class="btn btn-dark btn-block">
                </div>
            </form>
            <br>
            <?php /*
            <form method="POST" action="{{ route('plants.add-to-cart', ['slug' => $plant->slug, 'qty' => 1]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="add-to-cart" value="Add to cart" class="btn btn-primary btn-block">
                </div>
            </form>
            */ ?>
        @else
            <form method="POST" action="{{ route('plants.return', ['slug' => $plant->slug]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="send" value="Return from archive" class="btn btn-dark btn-block">
                </div>
            </form>
        @endif
    </div>
@endsection
