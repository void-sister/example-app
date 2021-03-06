@extends('layouts.dashboard')

@section('title', 'Trashed users')

@section('dashboard')
    <!-- USER DATA-->
    <div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="fa fa-archive"></i>Trashed Users</h3>
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
        </div>

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
                    <td>trashed date</td>
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
                        <td>{{ $user->deleted_at }}</td>
                        <td>
                            <div class="table-data-feature">
                                <form method="POST" action="{{ route('users.restore', ['id' => $user->id]) }}" style="margin-right: 5px">
                                    @csrf
                                    <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Restore">
                                        <i class="fa fa-reply"></i>
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('users.destroy', ['user' => $user]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="user-data__footer">
            <button class="au-btn au-btn-load">load more</button>
        </div>
    </div>
    <!-- END USER DATA-->
@endsection
