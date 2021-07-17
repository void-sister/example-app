@extends('layouts.app')

@section('title', 'Product show')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <p>SKU: {{ $product->SKU }}</p>
        <p>slug: {{ $product->slug }}</p>
        <p>product_name: {{ $product->product_name }}</p>
        <p>product_description: {{ $product->product_description }}</p>
        <p>care_rules: {{ $product->care_rules }}</p>
        <p>height: {{ $product->height }}</p>
        <p>price: {{ $product->price }}</p>
        <p>discount: {{ $product->discount }}</p>
        <p>units_in_stock: {{ $product->units_in_stock }}</p>
        <p>units_on_order: {{ $product->units_on_order }}</p>
        <p>product_available: {{ $product->product_available }}</p>
        <p>discount_available: {{ $product->discount_available }}</p>
        <p>is_archived: {{ $product->is_archived }}</p>

        @if(!$product->is_archived)
            <form method="POST" action="{{ route('products.archive', ['slug' => $product->slug]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="send" value="Archive" class="btn btn-dark btn-block">
                </div>
            </form>
            <br>
            <form method="POST" action="{{ route('products.add-to-cart', ['slug' => $product->slug, 'qty' => 1]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="add-to-cart" value="Add to cart" class="btn btn-primary btn-block">
                </div>
            </form>
        @else
            <form method="POST" action="{{ route('products.return', ['slug' => $product->slug]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="send" value="Return from archive" class="btn btn-dark btn-block">
                </div>
            </form>
        @endif
    </div>
@endsection
