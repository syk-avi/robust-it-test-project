@inject('menuRoles', 'App\Modules\User\Services\CheckUserRoles')
@php
    $currentRoute = Request::route()->getName();
    $menu = [];
@endphp
@inject('menuService', '\App\Modules\User\Services\MenuService')

<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">


                <li class="nav-item">
                    <a href="{{route('dashboard')}}"
                       class="nav-link {{$menuService->activeMenu($currentRoute,'dashboard')}}">
                        <i class="icon-home4"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                @if($menuRoles->assignedRoles('page.index'))
                    <li class="nav-item">
                        <a href="{{route('page.index')}}"
                           class="nav-link {{$menuService->activeMenu($currentRoute,'page.index')}}">
                            <i class="icon-files-empty"></i>
                            <span> Page </span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('banner.index'))
                    <li class="nav-item">
                        <a href="{{route('banner.index')}}"
                           class="nav-link {{$menuService->activeMenu($currentRoute,'banner.index')}}">
                            <i class="icon-images2"></i>
                            <span> Banner </span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('admin.index'))

                    <li class="nav-item">
                        <a href="{{route('admin.index')}}"
                           class="nav-link {{$menuService->activeMenu($currentRoute,'admin.index')}}">
                            <i class="icon-user-plus"></i>
                            <span> User </span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('role.index'))
                    <li class="nav-item">
                        <a href="{{route('role.index')}}"
                           class="nav-link {{$menuService->activeMenu($currentRoute,'role.index')}}">
                            <i class="icon-equalizer4"></i>
                            <span> Role </span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('globalsetting.create'))


                    <li class="nav-item">
                        <a href="{{route('globalsetting.create')}}"
                           class="nav-link {{$menuService->activeMenu($currentRoute,'globalsetting.create')}}">
                            <i class="icon-gear"></i>
                            <span> Global Setting </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>