@extends('front.master')
@section('title')
    user
@endsection
@section('body')
    <div class="profile-bg">
        <!-- user info edit button -->
        @if(\Illuminate\Support\Facades\Auth::user())
            @if((\Illuminate\Support\Facades\Auth::user()->role != 'admin') && (\Illuminate\Support\Facades\Auth::user()->id == $user->id))
                <section class="">
                    <div class="container bg-white">
                        <div class="row">
                            <div class="col-12">
                                <div class="py-4">
                                    <a href="javascript:void(0)" style="float: right; color: black;" class="float-right btn btn-outline-warning text-black" id="disableInputs">Edit</a>
                                    <a href="javascript:void(0)" style="float: right; color: black;" class="float-right btn btn-outline-danger text-black" id="closeBtn">Close</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif

    <!-- user info display section -->
        <section class="" id="userDisplaySec">
            <div class="container bg-white pb-5">
                <div class="row py-5">
                    <div class="col-12">
                        <h2 class="orelega-one fw-bold text-center f-s-36 text-orange text-capitalize pb-3">Informations of User</h2>
                        <h5 class="orelega-one text-success text-center text-capitalize f-s-26">Personal information</h5>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Name</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->name)  ? $userProfileDetails->name : 'No Data' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Nick Name</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->nick_name) ? $userProfileDetails->nick_name : 'No Data' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Father's Name</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->father_name)  ? $userProfileDetails->father_name : 'No Data' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Mother's Name</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->mother_name)  ? $userProfileDetails->mother_name : 'No Data' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Brothers</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->have_brother) == 1 ? 'Yes' : 'No' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Sisters</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->have_sister) == 1 ? 'Yes' : 'No' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Email</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->email)  ? $userProfileDetails->email:'No Data' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Phone</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->phone) ? $userProfileDetails->phone:'No Data' }}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4" for="">Present Address</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro" style="text-align: justify;">: {{ isset($userProfileDetails->present_address) ? $userProfileDetails->present_address:'No Data' }}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4" for="">Permanent Address</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro " style="text-align: justify;">: {{ isset($userProfileDetails->permanent_address) ? $userProfileDetails->permanent_address:'No Data' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="roboto fw-bold px-4 pb-2" for="">Habits</label>
                            </div>
                            <div class="col-md-9">
                                <span class="source-sans-pro">: {{ isset($userProfileDetails->habits) ? $userProfileDetails->habits:'No Data' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <img class="img-fluid" src="{{ isset($userProfileDetails->profile_image) ? asset($userProfileDetails->profile_image) : asset('/').'front/img/user.png' }}" style="height: 400px;" alt="">
                        </div>
                        <div class="mt-3 d-grid col-8 mx-auto">
                            <a href="{{ route('user-gallery', ['id' => $user->id, 'name' => str_replace(' ', '-', $user->name)]) }}" class="btn btn-orange">View Gallery Images</a>
                        </div>
                    </div>
                    <h5 class="orelega-one f-s-26 text-success text-center text-capitalize py-2">Educational information</h5>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="" class="pb-1 fw-bold">Primary School</label>
                            <p class="roboto">{{ isset($userProfileDetails->primary_school) ? $userProfileDetails->primary_school:'No Data' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="pb-1 fw-bold">High School</label>
                            <p class="roboto">{{ isset($userProfileDetails->high_school) ? $userProfileDetails->high_school:'No Data' }}</p>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="" class="pb-1 fw-bold">HSC (College Name)</label>
                            <p class="roboto">{{ isset($userProfileDetails->hsc_college_name) ? $userProfileDetails->hsc_college_name:'No Data' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="pb-1 fw-bold">Honours (Institute Name)</label>
                            <p class="roboto">{{ isset($userProfileDetails->honours_college_name) ? $userProfileDetails->honours_college_name:'No Data' }}</p>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="" class="pb-1 fw-bold">Masters (Institute Name)</label>
                            <p class="roboto">{{ isset($userProfileDetails->masters_college_name) ? $userProfileDetails->masters_college_name:'No Data' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="pb-1 fw-bold">Company Name (For Job Holders)</label>
                            <p class="roboto">{{ isset($userProfileDetails->company_name)  ? $userProfileDetails->company_name:'No Data' }}</p>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-12">
                        <h5 class="orelega-one f-s-26 text-success text-center text-capitalize py-2">Contact information</h5>
                        <div class="py-4 d-flex justify-content-center">
                            <ul class="nav flex-row d-flex justify-content-center">

                                <li class="px-2 ">
                                    <a href="{!! (isset($userProfileDetails->phone_2))  ? 'tel:'.$userProfileDetails->phone_2 : 'javascript:void(0)' !!}" class="" title="Phone Number"><i class="fas fa-phone-alt text-orange fa-2x"></i></a>
                                </li>
                                <li class="px-2 ">
                                    <a href="{!! isset($userProfileDetails->email_2)  ? 'mailto:'.$userProfileDetails->email_2 : 'javascript:void(0)' !!}" class="" title="Email"><i class="fas fa-mail-bulk text-orange fa-2x"></i></a>
                                </li>
                                <li class="px-2 ">
                                    <a href="{!! isset($userProfileDetails->facebook)  ? $userProfileDetails->facebook : 'javascript:void(0)' !!}" class="" target="_blank" title="Facebook"><i class="fab fa-facebook text-orange fa-2x"></i></a>
                                </li>
                                <li class="px-2 ">
                                    <a href="{!! isset($userProfileDetails->whatsapp)  ? $userProfileDetails->whatsapp : 'javascript:void(0)' !!}" class="" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp text-orange fa-2x"></i></a>
                                </li>
                                <li class="px-2 ">
                                    <a href="{!! isset($userProfileDetails->skype)  ? $userProfileDetails->skype : 'javascript:void(0)' !!}" class="" target="_blank" title="Skype"><i class="fab fa-skype text-orange fa-2x"></i></a>
                                </li>
                                <li class="px-2 ">
                                    <a href="{!! isset($userProfileDetails->twitter)  ? $userProfileDetails->twitter : 'javascript:void(0)' !!}" class="" target="_blank" title="Twitter"><i class="fab fa-twitter text-orange fa-2x"></i></a>
                                </li>
                                <li class="px-2 ">
                                    <a href="{!! isset($userProfileDetails->instagram)  ? $userProfileDetails->instagram : 'javascript:void(0)' !!}" class="" target="_blank" title="Instagram"><i class="fab fa-instagram text-orange fa-2x"></i></a>
                                </li>
                                <li class="px-2 ">
                                    <a href="{!! isset($userProfileDetails->linkedin)  ? $userProfileDetails->linkedin : 'javascript:void(0)' !!}" class="" target="_blank" title="Linkedin"><i class="fab fa-linkedin text-orange fa-2x"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(\Illuminate\Support\Facades\Auth::user())
            @if((\Illuminate\Support\Facades\Auth::user()->role != 'admin') && (\Illuminate\Support\Facades\Auth::user()->id == $user->id))
                <!-- User Infotmation Section -->
                    <section class=" " id="userInfoSec">
                        <div class="container py-5 bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <h2 class="orelega-one fw-bold text-center f-s-36 text-orange">User Informations</h2>
                                    </div>
                                    <div class="py-3">
                                        <p class="roboto text-center">Please provide your infos here.</p>
                                    </div>
                                    <div class="my-2">
                                        <h5 class="orelega-one text-success text-center text-capitalize f-s-26">Personal information</h5>
                                        <livewire:front.user.profile />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            @endif
        @endif
        <!-- user comment sections -->
        <section class="">
            <div class="container bg-white" style="padding-bottom: 100px;">
                <div class="row pb-3">
                    <div class="col-md-12">

                        <div>
                            @if(!\Illuminate\Support\Facades\Auth::user())
                                <span class="orelega-one f-s-18 text-danger ms-4">Login to write something about this person.</span> <a href="{{ route('login') }}" class="text-success f-s-20" style="text-decoration: none;">Login</a> or <a href="{{ route('register') }}" class="text-orange f-s-20" style="text-decoration: none;">Register</a>
                            @else
                                <h3 class="fw-bold f-s-26 text-success text-center orelega-one ms-4 pb-4 text-capitalize">Write something about {{ $user->name }} </h3>
                                <div class="d-grid col-8 mx-auto">
                                    <a href="javascript:void(0)" class="btn btn-orange text-uppercase" id="commentBox">click me to write</a>
                                </div>
                                <div id="savbutton" style="display: none;" >
{{--                                    <livewire:front.comment.input :user="$user" />--}}
                                    @livewire('front.comment.input',['userx' => $user->id])
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
                <livewire:front.user.commentshow :userId="$user->id" />
            </div>
        </section>
    </div>
@endsection
