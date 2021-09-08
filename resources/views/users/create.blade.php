@extends('layouts.dashboard')

@section('dashboard')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create User</strong> Form
            </div>
            <div class="card-body card-block">
                <form action="{{ route('users.store') }}" id="user-form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    @include('users.form', ['roles' => $roles])
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" form="user-form" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" form="user-form" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
@endsection
