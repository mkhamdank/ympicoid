<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                @foreach(Auth::user()->role->permissions as $perm)
                @php
                $navs[] = $perm->navigation_code;
                @endphp
                @endforeach

                @if(in_array('Dashboard', $navs))
                @if(isset($page) && $page == "Dashboard")<li class="sidebar-item active">@else<li class="sidebar-item">@endif
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url("admin/home") }}"><i class="fa fa-industry"></i>  <span class="hide-menu">Dashboard</span></a>
                </li>
                @endif

                @if(in_array('A3', $navs))
                @if(isset($page) && $page == "Navigation")<li class="sidebar-item active">@else<li class="sidebar-item">@endif
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url("/index/navigation") }}"><i class="fa fa-arrow-right"></i> <span class="hide-menu">Navigation</span></a>
                </li>
                @endif

                @if(in_array('A4', $navs))
                @if(isset($page) && $page == "Role")<li class="sidebar-item active">@else<li class="sidebar-item">@endif
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url("/index/role") }}"><i class="fa fa-cogs"></i> <span class="hide-menu">Role</span></a>
                </li>
                @endif

                @if(in_array('A6', $navs))
                @if(isset($page) && $page == "User")<li class="sidebar-item active">@else<li class="sidebar-item">@endif
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url("/index/user") }}"><i class="fa fa-users"></i> <span class="hide-menu">User</span></a>
                </li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-close"></i> <span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>