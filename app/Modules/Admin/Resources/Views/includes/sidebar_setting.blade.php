<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <h5 style="margin: 0">Avinesh Shakya</h5>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>


        </ul>

        <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    @if(!is_null(auth()->guard('admins')->user()->profile_image))
                        <img src="{{auth()->guard('admins')->user()->profile_image}}"
                             class="rounded-circle mr-2" height="34" alt="">
                    @else
                        <img src="{{asset('admin-assets/global_assets/images/placeholders/placeholder.jpg')}} "
                             class="rounded-circle mr-2" height="34" alt="">
                    @endif


                    <span>{{auth()->guard('admins')->user()->username}}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{route('admin.profile')}}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="{{route('setting.change-password')}}" class="dropdown-item"><i class="icon-lock"></i>
                        Change Password</a>
                    <a href="{{route('logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>