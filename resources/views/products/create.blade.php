@extends('layouts.app')

@section('title', 'Create product')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            @include('products.form')
        </form>
    </div>
@endsection
