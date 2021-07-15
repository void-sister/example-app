@extends('layouts.app')

@section('title', 'shop page')

@section('content')

    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">SKU</th>
                <th scope="col">Slug</th>
                <th scope="col">Product name</th>
                <th scope="col">Product description</th>
                <th scope="col">Care rules</th>
                <th scope="col">Indoor light</th>
                <th scope="col">Outdoor light</th>
                <th scope="col">Air cleaner</th>
                <th scope="col">Pet friendly</th>
                <th scope="col">Difficulty</th>
                <th scope="col">Height</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Discount</th>
                <th scope="col">Units in stock</th>
                <th scope="col">Units on order</th>
                <th scope="col">Product available</th>
                <th scope="col">Discount available</th>
                <th scope="col">Rating</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->SKU }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_description }}</td>
                        <td>{{ $product->care_rules }}</td>
                        <td>{{ $product->getIndoorLightType($product->indoor_light) }}</td>
                        <td>{{ $product->getOutdoorLightType($product->outdoor_light) }}</td>
                        <td>{{ $product->isAirCleaner($product->air_cleaner) ? 'Yes' : 'No' }}</td>
                        <td>{{ $product->isPetFriendly($product->pet_friendly) ? 'Yes' : 'No' }}</td>
                        <td>{{ $product->getDifficultyType($product->difficulty) }}</td>
                        <td>{{ $product->height }}</td>
                        <td>{{ $product->getSize($product->size) }}</td>
                        <td>${{ $product->price }}</td>
                        <td>${{ $product->discount }}</td>
                        <td>{{ $product->units_in_stock }}</td>
                        <td>{{ $product->units_on_order }}</td>
                        <td>{{ $product->product_available ? 'Yes' : 'No' }}</td>
                        <td>{{ $product->discount_available ? 'Yes' : 'No' }}</td>
                        <td>{{ $product->ranking }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
