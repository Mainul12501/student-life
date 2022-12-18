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
{{--                                        <form action="" method="POST">                                            --}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-8">--}}
{{--                                                    <div class="row align-items-center py-2">--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="" class="pb-1">Name</label>--}}
{{--                                                            <input type="text" class="form-control">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="" class="pb-1">Nick Name</label>--}}
{{--                                                            <input type="text" class="form-control">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row align-items-center py-2">--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="" class="pb-1">Father's Name</label>--}}
{{--                                                            <input type="text" class="form-control">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="" class="pb-1">Mother's Name</label>--}}
{{--                                                            <input type="text" class="form-control">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row align-items-center">--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-6">--}}
{{--                                                                    <label for="" class="">Have Brothers?</label>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-6">--}}
{{--                                                                    <input type="radio" name="bros" id="broYes" value="1"> Yes--}}
{{--                                                                    <input type="radio" name="bros" checked id="broNo" value="0"> No--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-6">--}}
{{--                                                                    <label for="" class="col">Have Sisters?</label>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-6">--}}
{{--                                                                    <input type="radio" name="sis" id="sisYes" value="1"> Yes--}}
{{--                                                                    <input type="radio" name="sis" checked id="sisNo" value="0"> No--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row py-2 bro-sis-name hidden" >--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <div class="hidden" id="broNameField">--}}
{{--                                                                <label for="">Brother's Names</label>--}}
{{--                                                                <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>--}}
{{--                                                                <span class="f-s-13 text-danger roboto text-capitalize">please separate your brothers name with comma( , )</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <div class="hidden" id="sisNameField">--}}
{{--                                                                <label for="">Sister's Names</label>--}}
{{--                                                                <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>--}}
{{--                                                                <span class="f-s-13 text-danger roboto text-capitalize">please separate your sisterss name with comma( , )</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row align-items-center py-2">--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="" class="pb-1">Email</label>--}}
{{--                                                            <input type="email" class="form-control">--}}
{{--                                                            <input type="hidden" name="" id="userAuthEmail" value="test@admin.com">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="" class="pb-1">Email</label>--}}
{{--                                                            <input type="text" class="form-control">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row align-content-center py-2">--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="">Present Address</label>--}}
{{--                                                            <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="">Permanent Address</label>--}}
{{--                                                            <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row py-2 align-content-center">--}}
{{--                                                        <div class="col-md-6">--}}
{{--                                                            <label for="">Habits</label>--}}
{{--                                                            <textarea name="" class="form-control" id="" cols="30" rows="2"></textarea>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-4">--}}
{{--                                                    <div>--}}
{{--                                                        <label for="" class="roboto">Profile Image</label> <span class="text-orange">[Required]</span>--}}
{{--                                                        <div class="user-details-personal-img pt-1">--}}
{{--                                                            <img src="" style="height: 100px; width: 100px;" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <input type="file" class="form-control mt-2 show-me hide-me">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="py-2">--}}
{{--                                                        <label for="" class="roboto">Gallery Images</label> <span class="text-orange">[Optional]</span>--}}
{{--                                                        <input type="file" class="form-control py-2 show-me hide-me">--}}
{{--                                                        <div class="py-2">--}}
{{--                                                            <img src="" class="user-gallery-img" alt="">--}}
{{--                                                            <img src="" class="user-gallery-img" alt="">--}}
{{--                                                            <img src="" class="user-gallery-img" alt="">--}}
{{--                                                            <img src="" class="user-gallery-img" alt="">--}}
{{--                                                            <img src="" class="user-gallery-img" alt="">--}}
{{--                                                            <img src="" class="user-gallery-img" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="d-grid col-6 mx-auto">--}}
{{--                                                            <a href="imageGallary.html" class="btn btn-orange">View All Images</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <h5 class="orelega-one f-s-26 text-success text-center text-capitalize py-2">Educational information</h5>--}}
{{--                                            <div class="row py-2">--}}
{{--                                                <div class="col-md-6">--}}
{{--                                                    <label for="" class="pb-1">Primary School</label>--}}
{{--                                                    <input type="text" class="form-control">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-6">--}}
{{--                                                    <label for="" class="pb-1">High School</label>--}}
{{--                                                    <input type="text" class="form-control">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row py-2">--}}
{{--                                                <div class="col-md-6">--}}
{{--                                                    <label for="" class="pb-1">HSC (College Name)</label>--}}
{{--                                                    <input type="text" class="form-control">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-6">--}}
{{--                                                    <label for="" class="pb-1">Honours (Institute Name)</label>--}}
{{--                                                    <input type="text" class="form-control">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row py-2">--}}
{{--                                                <div class="col-md-6">--}}
{{--                                                    <label for="" class="pb-1">Masters (Institute Name)</label>--}}
{{--                                                    <input type="text" class="form-control">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-6">--}}
{{--                                                    <label for="" class="pb-1">Company Name (For Job Holders)</label>--}}
{{--                                                    <input type="text" class="form-control">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <h5 class="orelega-one f-s-26 text-success text-center text-capitalize py-2">Contact and Social information</h5>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-6 col-sm-6">--}}
{{--                                                    <div class="input-group py-2" title="Phone Number">--}}
{{--                                                        <span class="input-group-text bg-orange"><i class="fas fa-phone-alt text-white"></i></span>--}}
{{--                                                        <input type="text" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="input-group py-2" title="Email Address">--}}
{{--                                                        <span class="input-group-text bg-orange"><i class="fas fa-mail-bulk text-white"></i></span>--}}
{{--                                                        <input type="text" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="input-group py-2" title="Facebook">--}}
{{--                                                        <span class="input-group-text bg-orange"><i class="fab fa-facebook text-white"></i></span>--}}
{{--                                                        <input type="text" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="input-group py-2" title="Whatsapp">--}}
{{--                                                        <span class="input-group-text bg-orange"><i class="fab fa-whatsapp text-white"></i></span>--}}
{{--                                                        <input type="text" class="form-control">--}}
{{--                                                    </div>--}}


{{--                                                </div>--}}
{{--                                                <div class="col-md-6 col-sm-6">--}}
{{--                                                    <div class="input-group py-2" title="Skype">--}}
{{--                                                        <span class="input-group-text bg-orange"><i class="fab fa-skype text-white"></i></span>--}}
{{--                                                        <input type="text" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="input-group py-2" title="Twitter">--}}
{{--                                                        <span class="input-group-text bg-orange"><i class="fab fa-twitter text-white"></i></span>--}}
{{--                                                        <input type="text" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="input-group py-2" title="Instagram">--}}
{{--                                                        <span class="input-group-text bg-orange"><i class="fab fa-instagram text-white"></i></span>--}}
{{--                                                        <input type="text" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="input-group py-2" title="Linkedin">--}}
{{--                                                        <span class="input-group-text bg-orange"><i class="fab fa-linkedin text-white"></i></span>--}}
{{--                                                        <input type="text" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row pt-4">--}}
{{--                                                <div class="col">--}}
{{--                                                    <div class="d-grid col-6 mx-auto">--}}
{{--                                                        <input type="submit" class="btn btn-success" id="userInfoSaveBtn" value="Save">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
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
{{--                                <form action="">--}}
{{--                                    <div class="d-flex flex-row">--}}
{{--                                        <div class="d-flex flex-column">--}}
{{--                                            <img class="img-fluid" style="border-radius: 50%; height: 50px;" src="{{ asset('/') }}front/img/user.png" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column w-100 ms-4" style="margin-top: 11px;">--}}
{{--                                            <input placeholder="Add a public comment....." type="text" class="form-control commentBox" id="commentBox">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-2" style="display: none;" id="savbutton">--}}
{{--                                        <div class="d-flex flex-row ms-3">--}}
{{--                                            <div class="d-flex flex-column w-100 ms-4" style="margin-top: 11px;">--}}
{{--                                                <label for="" class="ms-2 fw-bold">Image for comment</label>--}}
{{--                                                <input type="file" class="form-control" accept="image/*">--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex flex-column w-100 ms-4" style="margin-top: 11px;">--}}
{{--                                                <label for="" class="ms-2 fw-bold">Audio for comment</label>--}}
{{--                                                <input type="file" class="form-control" accept="audio/*">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-2">--}}
{{--                                            <input href="" class="btn btn-success float-end text-uppercase" disabled id="saveComment" value="Comment">--}}
{{--                                            <a href="" class="btn btn-primary float-end mr-5 text-uppercase" id="cancelComment" >Cancel</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
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
{{--                @if(isset($comments))--}}
{{--                    <h3 class="fw-bold f-s-26 text-success text-center orelega-one ms-4 pb-4 text-capitalize">Comments about {{ $user->name }} </h3>--}}
{{--                    @foreach($comments as $comment)--}}
{{--                        <?php--}}
{{--                        $userDetails    =\App\Models\admin\UserDetails::where('user_id', $comment->comment_to)->select('id','profile_image')->first();--}}
{{--                        ?>--}}
{{--                    @if($userDetails)--}}
{{--                        <div class="row py-1">--}}
{{--                            <div class="col-12">--}}

{{--                                <div class="d-flex flex-row">--}}
{{--                                    <div class="d-flex flex-column">--}}

{{--                                        <img class="img-fluid bg-danger" style="border-radius: 50%; height: 50px; vertical-align: middle !important;" src="{{ isset($userDetails->profile_image) ? $userDetails->profile_image : asset('/').'front/img/user.png' }}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column w-100" style="margin-top: 5px;">--}}
{{--                                        <h4 class="fw-bold f-s-20 orelega-one ms-4">{{ $comment->comment_to_name }}</h4>--}}
{{--                                        <p style="text-align: justify;" class="roboto f-s-16 ms-4">{{ $comment->comments }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                            @endif--}}
{{--                    @endforeach--}}
{{--                    --}}{{--                    <div class="row py-1">--}}
{{--                    --}}{{--                        <div class="col-12">--}}
{{--                    --}}{{--                            <div class="d-flex flex-row">--}}
{{--                    --}}{{--                                <div class="d-flex flex-column">--}}
{{--                    --}}{{--                                    <img class="img-fluid" style="border-radius: 50%; height: 50px; vertical-align: middle !important;" src="https://media.istockphoto.com/photos/picturesque-morning-in-plitvice-national-park-colorful-spring-scene-picture-id1093110112?k=6&m=1093110112&s=612x612&w=0&h=uBH7Rj-Ew_ixjunRrD_U7alq2ZUPJ_5XgMpe9xO52QQ=" alt="">--}}
{{--                    --}}{{--                                </div>--}}
{{--                    --}}{{--                                <div class="d-flex flex-column w-100" style="margin-top: 5px;">--}}
{{--                    --}}{{--                                    <h4 class="fw-bold f-s-20 orelega-one ms-4">Name</h4>--}}
{{--                    --}}{{--                                    <p style="text-align: justify;" class="roboto f-s-16 ms-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit non sequi, asperiores ipsam quo mollitia, veritatis magnam est excepturi veniam voluptatum repellat! Assumenda, laudantium harum! Ullam illum voluptas optio neque.</p>--}}
{{--                    --}}{{--                                </div>--}}
{{--                    --}}{{--                            </div>--}}
{{--                    --}}{{--                        </div>--}}
{{--                    --}}{{--                    </div>--}}
{{--                    @if(count($comments)>6)--}}
{{--                        <div class="row py-2">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="d-grid mx-auto col-5">--}}
{{--                                    <a href="{{ route('user-comments', ['id' => $user->id, 'name' => str_replace(' ', '-', $user->name)]) }}" class="btn btn-orange text-capitalize">view all comments about {{ $user->name }} </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endif--}}
            </div>
        </section>
    </div>
@endsection
