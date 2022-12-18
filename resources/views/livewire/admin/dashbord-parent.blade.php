<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @include('admin.menu.menu')
    @include('admin.menu.side-menu')
{{--        <livewire:admin.menu.menu />--}}



    <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="{{ Session::has('home-dashboard') ? 'display:block' : '' }}" >

            @if($siteLog  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.log.site />
            @endif
            @if($updateLog  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.log.update />
            @endif
            @if($reqEmail  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.user.changemail />
            @endif
            @if($userProfile  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.user.profile />
            @endif
            @if($galleryInput  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.gallery-input.input />
            @endif
            @if($userSuggesions  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.usersuggestions.manage />
            @endif
            @if($homegallaryslider  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.homegallaryslider.slider />
            @endif
            @if($userComment  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.user-comment.comment />
            @endif
            @if($createUser    == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.user.create-user />
            @endif
            @if($userMng  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.user.manage-user />
            @endif
            @if($subcategory  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.subcategory.sub-category />
            @endif
            @if($category  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.category.category />
            @endif

            @if($role  == true)
                @include('admin.includes.breadcrumb')
                <livewire:admin.role.role />
            @endif

            @if($home  == true)
                @include('admin.home.include-home')
            @endif
            @if(!Session::has('home-dashboard'))
                @include('admin.home.include-home')
            @endif
            <!-- ============================================================== -->
            @include('admin.includes.footer')
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
</div>
