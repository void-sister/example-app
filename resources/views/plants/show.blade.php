@extends('layouts.app')

@section('title', 'Plant show')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <p>SKU: {{ $plant->SKU }}</p>
        <p>slug: {{ $plant->slug }}</p>
        <p>plant_name: {{ $plant->plant_name }}</p>
        <p>plant_description: {{ $plant->plant_description }}</p>
        <p>care_rules: {{ $plant->care_rules }}</p>
        <p>height: {{ $plant->height }}</p>
        <p>price: {{ $plant->price }}</p>
        <p>discount: {{ $plant->discount }}</p>
        <p>units_in_stock: {{ $plant->units_in_stock }}</p>
        <p>units_on_order: {{ $plant->units_on_order }}</p>
        <p>plant_available: {{ $plant->plant_available }}</p>
        <p>discount_available: {{ $plant->discount_available }}</p>
        <p>is_archived: {{ $plant->is_archived }}</p>

        @if(!$plant->is_archived)
            <form method="POST" action="{{ route('plants.archive', ['slug' => $plant->slug]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="send" value="Archive" class="btn btn-dark btn-block">
                </div>
            </form>
            <br>
            <form method="POST" action="{{ route('plants.add-to-cart', ['slug' => $plant->slug, 'qty' => 1]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="add-to-cart" value="Add to cart" class="btn btn-primary btn-block">
                </div>
            </form>
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
