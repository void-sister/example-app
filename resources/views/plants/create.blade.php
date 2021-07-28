@extends('layouts.app')

@section('title', 'Create plant')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <form method="POST" action="{{ route('plants.store') }}">
            @csrf

            @include('plants.form')
        </form>
    </div>
@endsection
