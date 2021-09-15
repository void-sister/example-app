@extends('layouts.dashboard')

@section('title', 'Create plant')

@section('dashboard')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('plants.index') }}" class="btn btn-outline-info mr-2">< Back</a>
                <strong>Create Plant</strong> Form
            </div>
            <div class="card-body card-block">
                <form action="{{ route('plants.store') }}" id="plant-create-form" method="POST"
                      enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    @include('plants.form')
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" form="plant-create-form" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" form="plant-create-form" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
@endsection
