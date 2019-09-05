<aside class="main-sidebar elevation-4" style="min-height: 917px;background:#FFFFFF


">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" >
        <span class="brand-text font-weight-light" ><p style="text-color:white"><h3><img src="/images/logo.jpg" style="width:120px;height:90px;margin-left:0px"></h3></p></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-tabs nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" style="text-color:black">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p style="color:black">
                            <i class="fas fa-tachometer-alt">
                            
                            <span>{{ trans('global.dashboard') }}</span></i>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview ">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-user-circle">

                            </i>
                            <p>
                                <span ><strong>Membership</strong></span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                           
                            @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("members.index") }}" class="nav-link {{ request()->is('members') || request()->is('members/*') ? 'active' : '' }}">
                                    <i class="fas fa-user">

                                    </i>
                                    <p>
                                            <p style="font-size:11px;color:black">
                                        <span>Members</span>
                                    </p>
                                </a>
                            </li>
                            @endcan
                        @can('user_access')
                        <li class="nav-item">
                            <a href="{{ route("groups.index") }}" class="nav-link {{ request()->is('groups') || request()->is('groups/*') ? 'active' : '' }}">
                                <i class="fas fa-users">

                                </i>
                                <p>
                                    <p style="font-size:11px;color:black">
                                    <span>Groups</span>
                                </p>
                            </a>
                        </li>
                    @endcan
                     </ul>
                    </li>
                @endcan
                
                @can('user_management_access')
                <li class="nav-item has-treeview ">
                    <a class="nav-link nav-dropdown-toggle">
                        <i class="fas fa-globe">

                        </i>
                        <p>
                            <span ><strong>Admin Structure</strong></span>
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("counties.index") }}" class="nav-link {{ request()->is('groups') || request()->is('groups/*') ? 'active' : '' }}">
                                    <i class="fas fa-street-view">

                                    </i>
                                    <p>
                                        <p style="font-size:11px;color:black">
                                        <span>Provincial</span>
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                        <li class="nav-item">
                            <a href="{{ route("constituencies.index") }}" class="nav-link {{ request()->is('constituencies') || request()->is('constituencies/*') ? 'active' : '' }}">
                                <i class="fas fa-street-view">

                                </i>
                                <p>
                                    <p style="font-size:11px;color:black">
                                    <span>Electoral</span>
                                </p>
                            </a>
                        </li>
                    @endcan
                 </ul>
                </li>
                @endcan

                @can('permission_access')
                <li class="nav-item has-treeview ">
                    <a class="nav-link nav-dropdown-toggle">
                        <i class="fas fa-cog">

                        </i>
                        <p>
                            <span ><strong>System</strong></span>
                            <i class="right fa fa-cog-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fas fa-unlock-alt">

                                    </i>
                                    <p>
                                        <p style="font-size:11px;color:black">
                                        <span>{{ trans('global.permission.title') }}</span>
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fas fa-briefcase">

                                    </i>
                                    <p>
                                        <p style="font-size:11px;color:black">
                                        <span>{{ trans('global.role.title') }}</span>
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fas fa-user">

                                    </i>
                                    <p>
                                        <p style="font-size:11px;color:black">
                                        <span>{{ trans('global.user.title') }}</span>
                                    </p>
                                </a>
                            </li>
                        @endcan
                        

                                  
                        
                      
                    </ul>
                </li>
                @endcan
              
                <li class="nav-item">
                    <a href="#" class="nav-link" ">
                        <p style="color:black">
                            <i class="fas fa-book">

                            </i>
                            <span>Reports</span>
                        </p>
                    </a>
                </li>
              
               
        <li class="nav-item">
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <p style="color:black">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>{{ trans('global.logout') }}</span>
                </p>
            </a>
        </li>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>