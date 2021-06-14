@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <form method="POST" action="{{ route('categories.update', ['slug' => $category->slug]) }}">
            @method('PUT')
            @csrf
            <div class="form-group mb-2">
                <label for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                       id="slug" name="slug" value="{{ $category->slug }}"
                       aria-describedby="slugHelp" placeholder="Enter slug">

                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <small id="slugHelp" class="form-text text-muted">Slug in english</small>
            </div>

            <div class="form-group mb-2">
                <label for="name_ru">Name ru</label>
                <input type="text" class="form-control @error('name_ru') is-invalid @enderror"
                       id="name_ru" name="name_ru"
                       placeholder="Name ru" value="{{ $category->name_ru }}">

                @error('name_ru')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="name_uk">Name uk</label>
                <input type="text" class="form-control @error('name_uk') is-invalid @enderror"
                       id="name_uk" name="name_uk"
                       placeholder="Name uk" value="{{ $category->name_uk }}">

                @error('name_uk')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid mt-3">
                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </div>
        </form>
    </div>
@endsection
