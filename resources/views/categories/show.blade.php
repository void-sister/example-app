@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <p>show: {{ $category->id }} - {{ $category->slug }} | {{ $category->name_ru }} | {{ $category->name_uk }} | {{ $category->description }} | {{ $category->is_archived }}</p>

        @if(!$category->is_archived)
            <form method="POST" action="{{ route('categories.archive', ['slug' => $category->slug]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="send" value="Archive" class="btn btn-dark btn-block">
                </div>
            </form>
        @else
            <form method="POST" action="{{ route('categories.return', ['slug' => $category->slug]) }}">
                @csrf
                <div class="d-grid mt-3">
                    <input type="submit" name="send" value="Return from archive" class="btn btn-dark btn-block">
                </div>
            </form>
        @endif
    </div>
@endsection
