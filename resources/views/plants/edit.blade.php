@extends('layouts.dashboard')

@section('title', 'Edit plant')

@section('dashboard')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a type="button" href="{{ route('plants.index') }}" class="btn btn-outline-info mr-2">< Back</a>
                <strong>Edit Plant</strong> Form
            </div>
            <div class="card-body card-block">
                <form action="{{ route('plants.update', ['plant' => $plant]) }}" id="plant-edit-form" method="POST"
                      enctype="multipart/form-data" class="form-horizontal">
                    @method('PUT')
                    @csrf

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Plant name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{ $plant->name_ru }}</p>
                        </div>
                    </div>

                    @include('plants.form', ['plant' => $plant])
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" form="plant-edit-form" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" form="plant-edit-form" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
@endsection
