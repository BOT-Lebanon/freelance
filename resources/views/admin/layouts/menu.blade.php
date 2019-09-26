@if($user->RoleName[0]->role_id==1)
    <li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="material-icons text-success leftsize">group</i>
        <span class="title">Admin</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">



    <li class="{{ Request::is('admin/cities*') ? 'active' : '' }}">
        <a href="{!! route('admin.cities.index') !!}">
        <i class="material-icons text-danger leftsize">flag</i>
                   Cities
        </a>
    </li>

    <li class="{{ Request::is('admin/countries*') ? 'active' : '' }}">
        <a href="{!! route('admin.countries.index') !!}">
        <i class="material-icons text-danger leftsize">flag</i>
                   Countries
        </a>
    </li>

    <li class="{{ Request::is('admin/resources*') ? 'active' : '' }}">
        <a href="{!! route('admin.resources.index') !!}">
        <i class="material-icons text-danger leftsize">flag</i>
                   Resources
        </a>
    </li>


    <li class="{{ Request::is('admin/allowedusers*') ? 'active' : '' }}">
        <a href="{!! route('admin.allowedusers.index') !!}">
        <i class="material-icons text-danger leftsize">flag</i>
                   Allowedusers
        </a>
    </li>
    </ul>
</li>
@endif