<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" wire:ignore>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" >
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" >
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Personal</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link " wire:click.prevent="openHome()" href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard </span>

                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link " href="{{ route('role-mng') }}" wire:click.prevent="openRole()" aria-expanded="false">
                            <i class="mdi mdi-account-box"></i>
                            <span class="hide-menu">Role Management </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link " href="" wire:click.prevent="openCategory()" aria-expanded="false">
                            <i class="mdi mdi-basecamp"></i>
                            <span class="hide-menu">Category Management </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link " href="" wire:click.prevent="openSubCategory()" aria-expanded="false">
                            <i class="mdi mdi-basket-unfill"></i>
                            <span class="hide-menu">Sub - Category Management </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link " href="" aria-expanded="false" wire:click.prevent="userSuggestions()">
                            <i class="icon icon-people"></i>
                            <span class="hide-menu">User Contact or Suggestions</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link " href="" aria-expanded="false" wire:click.prevent="homegalleryslider()">
                            <i class="mdi mdi-folder-multiple-image"></i>
                            <span class="hide-menu">Home Gallery Slider Images</span>
                        </a>
                    </li>
                @endif


                <li class="sidebar-item">
                    <a class="sidebar-link " href="" aria-expanded="false" wire:click.prevent="galleryInput()">
                        <i class="ti-image"></i>
                        <span class="hide-menu">Gallery Files</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link " href="" aria-expanded="false" wire:click.prevent="userComment()">
                        <i class="ti-user"></i>
                        <span class="hide-menu">Review a person</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-code-braces"></i>
                        <span class="hide-menu">{{ \Illuminate\Support\Facades\Auth::user()->role == 'admin' ? 'User Management' : 'Profile' }} </span>
                        <span class="badge badge-pill badge-info ml-auto m-r-15">2</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                        <li class="sidebar-item" wire:click.prevent="openCreateUser()">
                            <a href="" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Create User </span>
                            </a>
                        </li>
                        <li class="sidebar-item" wire:click.prevent="openUserMng()">
                            <a href="" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Manage User Info </span>
                            </a>
                        </li>
                        @else
                            <li class="sidebar-item" wire:click.prevent="userProfile()">
                                <a href="" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Edit Profile </span>
                                </a>
                            </li>
                            <li class="sidebar-item" wire:click.prevent="requestEmail()">
                                <a href="" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Email Change </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="" onclick="event.preventDefault(); document.getElementById('logoutButton').submit()" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                    <form action="{{ route('logout') }}" id="logoutButton" method="post">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
