@extends('layouts.dashboard')

@section('dashboard')
    <!-- USER DATA-->
    <div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-account-calendar"></i>user data</h3>
        <div class="filters m-b-45">
            <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                <select class="js-select2" name="property">
                    <option selected="selected">All Properties</option>
                    <option value="">Products</option>
                    <option value="">Services</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <div class="rs-select2--dark rs-select2--sm m-r-10 rs-select2--border">
                <select class="js-select2 au-select-dark" name="time">
                    <option selected="selected">All Time</option>
                    <option value="">By Month</option>
                    <option value="">By Day</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>

            <button type="button" class="btn btn-success" style="height: 40px">
                <a href="{{ route('users.create') }}">Create</a>
            </button>

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
                    <td>type</td>
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
                            <span class="role admin">admin</span>
                        </td>
                        <td>
                            <div class="rs-select2--trans rs-select2--sm">
                                <select class="js-select2" name="property">
                                    <option selected="selected">Full Control</option>
                                    <option value="">Post</option>
                                    <option value="">Watch</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </td>
                        <td>
                            <span class="more">
                                <i class="zmdi zmdi-more"></i>
                            </span>
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
