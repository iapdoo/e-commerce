<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview {{active_menu('admin')[0]}}">
            <a href="{{aurl('')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{trans('admin.dashboard')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" {{active_menu('admin')[1]}}>
                <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{trans('admin.dashboard')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{aurl('settings')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{trans('admin.settings')}}</p>
                    </a>
                </li>


            </ul>
        </li>
        <li class="nav-item has-treeview {{active_menu('admin')[0]}}">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{trans('admin.admin')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview {{active_menu('admin')[1]}}">
                <li class="nav-item">
                    <a href="{{aurl('admin')}}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        {{trans('admin.admin')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{aurl('admin/create')}}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        {{trans('admin.add')}}
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{active_menu('users')[0]}}">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{trans('admin.users')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview {{active_menu('users')[1]}}">
                <li class="nav-item">
                    <a href="{{aurl('users')}}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        {{trans('admin.users')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{aurl('users/create')}}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        {{trans('admin.user_add')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{aurl('users/user')}}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        {{trans('admin.user')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{aurl('users/vendor')}}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        {{trans('admin.vendor')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{aurl('users/company')}}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        {{trans('admin.company')}}
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->