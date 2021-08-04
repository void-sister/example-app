@extends('layouts.app')

@section('title', 'shop page')

@section('content')

    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Slug</th>
                <th scope="col">Name ru</th>
                <th scope="col">Description</th>
                <th scope="col">Care rules</th>
                <th scope="col">Indoor light</th>
                <th scope="col">Outdoor light</th>
                <th scope="col">Air cleaner</th>
                <th scope="col">Pet friendly</th>
                <th scope="col">Difficulty</th>
                <th scope="col">Height</th>
                <th scope="col">Size</th>
                <th scope="col">Rating</th>
                <th scope="col">Notes</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($plants as $plant)
                <tr>
                    <th scope="row">{{ $plant->id }}</th>
                    <td>{{ $plant->slug }}</td>
                    <td>{{ $plant->name_ru }}</td>
                    <td>{{ $plant->description_ru }}</td>
                    <td>{{ $plant->care_rules_ru }}</td>
                    <td>{{ $plant->getIndoorLightType($plant->indoor_light) }}</td>
                    <td>{{ $plant->getOutdoorLightType($plant->outdoor_light) }}</td>
                    <td>{{ $plant->isAirCleaner($plant->air_cleaner) ? 'Yes' : 'No' }}</td>
                    <td>{{ $plant->isPetFriendly($plant->pet_friendly) ? 'Yes' : 'No' }}</td>
                    <td>{{ $plant->getDifficultyType($plant->difficulty) }}</td>
                    <td>{{ $plant->height }}</td>
                    <td>{{ $plant->getSize($plant->size) }}</td>
                    <td>{{ $plant->ranking }}</td>
                    <td>{{ $plant->notes }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
