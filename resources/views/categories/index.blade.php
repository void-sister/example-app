@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        @foreach ($categories as $category)
            <p>{{ $category->id }} - {{ $category->slug }} | {{ $category->name_ru }} | {{ $category->name_uk }} | {{ $category->description }} | {{ $category->is_archived }}</p>
        @endforeach
    </div>
@endsection
