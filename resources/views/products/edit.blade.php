@extends('layouts.app')

@section('title', 'Edit product')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <form method="POST" action="{{ route('products.update', ['slug' => $product->slug]) }}">
            @method('PUT')
            @csrf

            @include('products.form', ['product' => $product])
        </form>
    </div>
@endsection
