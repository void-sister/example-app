<ul class="@if(!$mobile) navbar__list @else navbar-mobile__list @endif list-unstyled">

    {{--Dashboard--}}
    <li class="active has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-dashboard"></i>Dashboard</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">Statistic</a>
            </li>
        </ul>
    </li>

    {{--Tasks--}}
    <li>
        <a href="#">
            <i class="fa fa-check-square-o"></i>Tasks</a>
    </li>

    {{--Orders--}}
    <li>
        <a href="#">
            <i class="fa fa-money"></i>Orders</a>
    </li>

    {{--Customers--}}
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-users"></i>Customers</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a href="#">List</a>
            </li>
            <li>
                <a href="#">Loyalty</a>
            </li>
        </ul>
    </li>

    {{--Products--}}
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-star-o"></i>Products</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a href="#">Plants</a>
            </li>
            <li>
                <a href="#">Pots</a>
            </li>
            <li>
                <a href="#">Soil</a>
            </li>
            <li>
                <a href="#">Accessories</a>
            </li>
            <li>
                <a href="#">Tech</a>
            </li>
            <li>
                <a href="#">Bouquets</a>
            </li>
            <li>
                <a href="#">For florists</a>
            </li>
        </ul>
    </li>

    {{--Plants--}}
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-pagelines"></i>Plants</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a class="btn-green-link" href="{{ route('plants.create') }}">Create plant</a>
            </li>
            <li>
                <a href="{{ route('plants.index') }}">List</a>
            </li>
        </ul>
    </li>

    {{--Posts--}}
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-align-left"></i>Posts</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a href="#">Blog</a>
            </li>
            <li>
                <a href="#">Knowledge Base</a>
            </li>
            <li>
                <a href="#">Care guides</a>
            </li>
        </ul>
    </li>

    {{--Calendar--}}
    <li>
        <a href="#">
            <i class="fa fa-calendar"></i>Calendar</a>
    </li>

    {{--Users--}}
    @role('admin')
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="zmdi zmdi-account-calendar"></i>Users</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a class="btn-green-link" href="{{ route('users.create') }}">Create user</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">List</a>
            </li>
            <li>
                <a href="{{ route('users.trashed') }}">Archive</a>
            </li>
            <li>
                <a href="#">Roles</a>
            </li>
            <li>
                <a href="{{ route('permissions.index') }}">Permissions</a>
            </li>
        </ul>
    </li>
    @endrole
</ul>
