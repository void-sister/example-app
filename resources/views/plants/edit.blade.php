@extends('layouts.app')

@section('title', 'Edit plant')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <form method="POST" action="{{ route('plants.update', ['slug' => $plant->slug]) }}">
            @method('PUT')
            @csrf

            @include('plants.form', ['plant' => $plant])
        </form>
    </div>
@endsection
