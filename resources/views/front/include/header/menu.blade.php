<!-- NAVIGATION MENU -->
<div class="wsmainfull menu clearfix">
    <div class="wsmainwp clearfix">


        <!-- LOGO IMAGE -->
        <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 90 pixels) -->
        <!--<div class="desktoplogo"><a href="" class="logo-black"><img src="images/dumi_logo.jpg" width="180" height="45" alt="header-logo"></a></div>-->
        <div class="desktoplogo"><a href="" class="logo-black"><img src="{{ asset('/') }}front/img/logo/logo.png" width="120" height="45" alt="header-logo"></a></div>
        <div class="desktoplogo"><a href="" class="logo-white"><img src="{{ asset('/') }}front/img/logo/logo.png" width="120" height="45" alt="header-logo"></a></div>
        <!--<div class="desktoplogo"><a href="" class="logo-white"><img src="images/dumi_logo.jpg" width="180" height="45" alt="header-logo"></a></div>-->


        <!-- MAIN MENU -->
        <nav class="wsmenu clearfix blue-header">
            <ul class="wsmenu-list">
                <!-- DROPDOWN MENU -->
                <li aria-haspopup="true"><a href="{{ route('/') }}" class="hover-red">Home</a></li>
                <li aria-haspopup="true"><a href="#">Teachers <span class="wsarrow"></span></a>
                    <ul class="sub-menu">
                        @foreach($teachers as $teacher)
                            <li aria-haspopup="true" class="hover-red"><a href="{{ route('user-profile',['id' => $teacher->id, 'name' => str_replace(' ', '-', $teacher->name)]) }}" class="text-capitalize">{{ $teacher->name }}</a></li>
                        @endforeach
                    </ul>
                </li>	<!-- END PAGES -->
                <li aria-haspopup="true"><a href="#">Students <span class="wsarrow"></span></a>
                    <div class="wsmegamenu clearfix">
                        <div class="container">
                            <div class="row">
                                <!-- MEGAMENU LINKS -->
                                @foreach($friends as $friend)
                                <ul class="col-md-3 col-xs-12 link-list">
                                    <li><a href="{{ route('user-profile',['id' => $friend->id, 'name' => str_replace(' ', '-', $friend->name)]) }}">{{ $friend->name }}</a></li>
                                </ul>
                            @endforeach
                            </div>  <!-- End row -->
                        </div>  <!-- End container -->
                    </div>  <!-- End wsmegamenu -->
                </li>	<!-- END PAGES -->

                <li aria-haspopup="true"><a href="{{ route('gallery-page') }}" class="hover-red text-capitalize">Gallery</a></li>
{{--                <li aria-haspopup="true"><a href="contact.html" class="hover-red text-capitalize">contact us</a></li>--}}
                <li aria-haspopup="true"><a href="#" class="hover-red"><i class="fas fa-user"></i><span class="wsarrow"></span></a>
                    <ul class="sub-menu">
                        @if(isset(Auth::user()->email))
                            <li aria-haspopup="true" class="hover-red"><a href="{{ route('dashboard') }}" class="text-capitalize">Dashboard</a></li>
                            <li aria-haspopup="true" class="hover-red" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"><a href="" class="text-capitalize">Logout</a></li>
                            <form action="{{ \Illuminate\Support\Facades\Auth::user()->role == 'user' ? route('logout') : route('admin.logout') }}" method="post" id="logoutForm">
                                @csrf
                            </form>
                        @else
                            <li aria-haspopup="true" class="hover-red"><a href="{{ route('login') }}" class="text-capitalize">Sign in</a></li>
                            <li aria-haspopup="true" class="hover-red"><a href="{{ route('register') }}" class="text-capitalize">Sign Up</a></li>
                        @endif
                    </ul>
                </li>
                <!-- END DROPDOWN MENU -->


                <!-- LAST NAVIGATION LINK -->
                <!-- <li class="get-con-btn" aria-haspopup="true"> -->
                <!--<a href="contacts-1.html" class="header-btn btn-primary tra-black-hover last-link">Get Consultation</a>-->
                <!-- <a href="form-test.html" class="btn btn-danger bg-danger px-1 py-2 org-button" style="color: black">Get Consultation</a> -->
                <!-- </li> -->


            </ul>
        </nav>
        <!-- END MAIN MENU -->

    </div>
</div>
<!-- END NAVIGATION MENU -->
