<ul class="@if(!$mobile) navbar__list @else navbar-mobile__list @endif list-unstyled">

    {{--Dashboard--}}
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-dashboard"></i>{{ __('Dashboard') }}</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">{{ __('Statistic') }}</a>
            </li>
        </ul>
    </li>

    {{--Tasks--}}
    <li>
        <a href="#">
            <i class="fa fa-check-square-o"></i>{{ __('Tasks') }}</a>
    </li>

    {{--Orders--}}
    <li>
        <a href="#">
            <i class="fa fa-money"></i>{{ __('Orders') }}</a>
    </li>

    {{--Customers--}}
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-users"></i>{{ __('Customers') }}</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a href="{{ route('customers.index') }}">{{ __('List') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Loyalty') }}</a>
            </li>
        </ul>
    </li>

    {{--Products--}}
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-star-o"></i>{{ __('Products') }}</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a href="{{ route('plants.index') }}">{{ __('Plants') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Pots') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Soil') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Fertilizers') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Accessories') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Tech') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Kits & florariums') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Books') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Furniture') }}</a>
            </li>
        </ul>
    </li>

    {{--Categories--}}
    <li>
        <a href="#">
            <i class="fa fa-tags"></i>{{ __('Categories') }}</a>
    </li>

    {{--Suppliers--}}
    <li>
        <a href="#">
            <i class="fa fa-truck"></i>{{ __('Suppliers') }}</a>
    </li>

    {{--Posts--}}
    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fa fa-align-left"></i>{{ __('Posts') }}</a>
        <ul class="list-unstyled @if(!$mobile) navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list">
            <li>
                <a href="#">{{ __('Blog') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Knowledge Base') }}</a>
            </li>
            <li>
                <a href="#">{{ __('Care guides') }}</a>
            </li>
        </ul>
    </li>

    {{--Calendar--}}
    <li>
        <a href="#">
            <i class="fa fa-calendar"></i>{{ __('Calendar') }}</a>
    </li>

    {{--Users--}}
    @role('admin')
    <li class="@if(request()->is('users', 'users/*', 'permissions')) active @endif has-sub">
        <a class="js-arrow @if(request()->is('users', 'users/*', 'permissions')) open @endif" href="#">
            <i class="zmdi zmdi-account-calendar"></i>{{ __('Users') }}
        </a>
        <ul class="list-unstyled @if(!$mobile)navbar__sub-list @else navbar-mobile-sub__list @endif js-sub-list"
            @if(request()->is('users', 'users/*', 'permissions')) style="display:block;" @endif>
            <li>
                <a class="btn-green-link" href="{{ route('users.create') }}">{{ __('Create user') }}</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">{{ __('List') }}</a>
            </li>
            <li>
                <a href="{{ route('users.trashed') }}">{{ __('Archive') }}</a>
            </li>
            <li>
                <a href="{{ route('permissions.index') }}">{{ __('Permissions') }}</a>
            </li>
        </ul>
    </li>
    @endrole
</ul>
