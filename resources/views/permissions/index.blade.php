@extends('layouts.dashboard')

@section('title', 'Permissions')

@section('dashboard')

<div class="row">
    {{--Permissions--}}
    <div class="col-lg-6">
        <div class="top-campaign">
            <div class="table-data__tool" style="margin-bottom: 20px!important;">
                <h3 class="title-3 m-b-30">
                    <i class="fa fa-unlock"></i>Permissions
                </h3>

                <div class="table-data__tool-right">
                    <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small"
                            data-toggle="modal" data-target="#createPermission">
                        <i class="zmdi zmdi-plus"></i>Add
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--full" type="text" name="search" placeholder="Search permission by name or slug..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{ __("$permission->name") }}</td>
                            <td>{{ $permission->slug }}</td>
                            <td>Assign to user</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--Roles--}}
    <div class="col-lg-6">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                <i class="fa fa-suitcase"></i>Roles
            </h3>
            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->slug }}</td>
                            <td>Edit permissions</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
