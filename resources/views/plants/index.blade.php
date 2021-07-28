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
                <th scope="col">Plant name</th>
                <th scope="col">Plant description</th>
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
                <th scope="col">Plant available</th>
                <th scope="col">Discount available</th>
                <th scope="col">Rating</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($plants as $plant)
                <tr>
                    <th scope="row">{{ $plant->id }}</th>
                    <td>{{ $plant->SKU }}</td>
                    <td>{{ $plant->slug }}</td>
                    <td>{{ $plant->plant_name }}</td>
                    <td>{{ $plant->plant_description }}</td>
                    <td>{{ $plant->care_rules }}</td>
                    <td>{{ $plant->getIndoorLightType($plant->indoor_light) }}</td>
                    <td>{{ $plant->getOutdoorLightType($plant->outdoor_light) }}</td>
                    <td>{{ $plant->isAirCleaner($plant->air_cleaner) ? 'Yes' : 'No' }}</td>
                    <td>{{ $plant->isPetFriendly($plant->pet_friendly) ? 'Yes' : 'No' }}</td>
                    <td>{{ $plant->getDifficultyType($plant->difficulty) }}</td>
                    <td>{{ $plant->height }}</td>
                    <td>{{ $plant->getSize($plant->size) }}</td>
                    <td>${{ $plant->price }}</td>
                    <td>${{ $plant->discount }}</td>
                    <td>{{ $plant->units_in_stock }}</td>
                    <td>{{ $plant->units_on_order }}</td>
                    <td>{{ $plant->plant_available ? 'Yes' : 'No' }}</td>
                    <td>{{ $plant->discount_available ? 'Yes' : 'No' }}</td>
                    <td>{{ $plant->ranking }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
