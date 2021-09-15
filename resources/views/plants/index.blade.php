@extends('layouts.dashboard')

@section('title', 'Plants list')

@section('dashboard')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-3 m-b-30">
                <i class="fa fa-pagelines"></i>Plants</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property">
                            <option selected="selected">All Properties</option>
                            <option value="">Option 1</option>
                            <option value="">Option 2</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <select class="js-select2" name="time">
                            <option selected="selected">Today</option>
                            <option value="">3 Days</option>
                            <option value="">1 Week</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <button class="au-btn-filter">
                        <i class="zmdi zmdi-filter-list"></i>filters</button>
                </div>
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i><a href="{{ route('plants.create') }}" style="color: white">Create</a></button>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <select class="js-select2" name="type">
                            <option selected="selected">Export</option>
                            <option value="">Excel</option>
                            <option value="">Google Sheets</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>
                                <label class="au-checkbox">
                                    <input type="checkbox">
                                    <span class="au-checkmark"></span>
                                </label>
                            </th>
                            <th>Name ru</th>
                            <th>Category</th>
                            <th>Notes</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plants as $plant)
                        <tr class="tr-shadow">
                            <td>
                                <label class="au-checkbox">
                                    <input type="checkbox">
                                    <span class="au-checkmark"></span>
                                </label>
                            </td>
                            <td>{{ $plant->name_ru }}</td>
                            <td>Orchids, House, Exclusive</td>
                            <td>{{ $plant->notes }}</td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <div style="margin-right: 5px;">
                                        @if(!$plant->is_archived)
                                            <form method="POST" action="{{ route('plants.archive', ['plant' => $plant]) }}">
                                                @csrf
                                                <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Archive">
                                                    <i class="fa fa-archive"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('plants.return', ['plant' => $plant]) }}">
                                                @csrf
                                                <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Return">
                                                    <i class="fa fa-reply"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
