@extends('layouts.dashboard')

@section('dashboard')
    <div class="user-data m-b-30">
        {{--Header--}}
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-account-calendar"></i>users data
        </h3>

        {{--Filters--}}
        <div class="filters m-b-45">
            <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border" style="width: 200px!important;">
                <select class="js-select2" name="property">
                    <option>All Roles</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <div class="dropDownSelect2"></div>
            </div>

            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i><a href="{{ route('users.create') }}" style="color: white">Create</a>
            </button>
        </div>

        {{--Table--}}
        <div class="table-responsive table-data">
            <table class="table">
                <thead>
                <tr>
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>name</td>
                    <td>role</td>
                    <td>last login</td>
                    <td>ip</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <div class="table-data__info">
                                <h6>{{ $user->name }}</h6>
                                <span>
                                    <a href="#">{{ $user->email }}</a>
                                </span>
                            </div>
                        </td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="role {{ $role->slug == 'admin' || $role->slug == 'manager' ? $role->slug : 'user' }}">
                                    {{ $role->slug }}
                                </span>
                            @endforeach
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <a href="{{ route('users.edit', ['user' => $user]) }}"><i class="zmdi zmdi-edit"></i></a>
                                </button>

                                @role('admin')
                                <form method="POST" action="{{ route('users.soft-delete', ['user' => $user]) }}">
                                    @csrf
                                    <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Trash">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                                @endrole
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--Load more--}}
        <div class="user-data__footer">
            <button class="au-btn au-btn-load">load more</button>
        </div>
    </div>
@endsection
