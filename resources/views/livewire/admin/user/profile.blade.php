<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card  border">
                    <div class="card-header bg-dark text-white font-14" >Update Your Profile</div>
                    <div class="card-body" >
                        <div id="errorMsgClose" class="text-justify">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @if($errors->count() == 1) {{$errors->first()}}
                                    @else
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="card-text text-center">
                            @if($message = Session::get('message'))
                                <div class="alert alert-success alert-dismissible fade show py-2" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>

                        <div>
                            <form action="" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <h5 class="orelega-one text-success text-center text-capitalize f-s-26">Personal information</h5>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row align-items-center py-2">
                                            <div class="col-md-6">
                                                <label for="" class="pb-1">Full Name</label>
                                                <input type="text" wire:model.defer="name" value="{{ isset($existDetails->name) ? $existDetails->name : '' }}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="pb-1">Nick Name</label>
                                                <input type="text" wire:model.defer="nick_name" value="{{ isset($existDetails->nick_name) ? $existDetails->nick_name : '' }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row align-items-center py-2">
                                            <div class="col-md-6">
                                                <label for="" class="pb-1">Father's Name</label>
                                                <input type="text" wire:model.defer="father_name" value="{{ isset($existDetails->father_name) ? $existDetails->father_name : '' }}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="pb-1">Mother's Name</label>
                                                <input type="text" wire:model.defer="mother_name" value="{{ isset($existDetails->mother_name) ? $existDetails->mother_name : '' }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="" class="">Have Brothers?</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="radio" wire:model.defer="have_brother" {{ isset($existDetails->have_brother) ? ($existDetails->have_brother == 1 ? 'checked' : '') : '' }} name="bros" id="broYes" value="1"> Yes
                                                        <input type="radio" wire:model.defer="have_brother" {{ isset($existDetails->have_brother) ? ($existDetails->have_brother == 0 ? 'checked' : '') : 'checked' }} name="bros" id="broNo" value="0"> No
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="" class="col">Have Sisters?</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="radio" wire:model.defer="have_sister" {{ isset($existDetails->have_sister) ? ($existDetails->have_sister == 1 ? 'checked' : '') : '' }} name="sis" id="sisYes" value="1"> Yes
                                                        <input type="radio" wire:model.defer="have_sister" {{ isset($existDetails->have_sister) ? ($existDetails->have_sister == 0 ? 'checked' : '') : 'checked' }}  name="sis" id="sisNo" value="0"> No
{{--                                                        <input type="radio" wire:model.defer="have_sister"  checked name="sis" id="sisNo" value="0"> No--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row py-2 bro-sis-name hidden" >
                                            <div class="col-md-6">
                                                <div class="hidden" id="broNameField">
                                                    <label for="">Brother's Names</label>
                                                    <textarea name="" wire:model="brother_name" class="form-control" id="" cols="30" rows="2">
                                                        @if($brothers)
                                                            @foreach($brothers as $brother)
                                                                {{ $brother->brother_name }},
                                                            @endforeach
                                                        @endif
                                                    </textarea>
                                                    <p class="roboto text-success">Brother's Names:
                                                        @if(isset($brothers))
                                                            @foreach($brothers as $brother)
                                                                {{ $brother->brother_name }},
                                                            @endforeach
                                                        @endif
                                                    </p>
                                                    <span class="f-s-13 text-danger roboto text-capitalize">please separate your brothers name with comma( , )</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="hidden" id="sisNameField">
                                                    <label for="">Sister's Names</label>
                                                    <textarea name="" wire:model="sister_name" class="form-control" id="" cols="30" rows="2">
                                                        @if($sisters)
                                                            @foreach($sisters as $sister)
                                                                {{ $sister->sister_name }},
                                                            @endforeach
                                                        @endif
                                                    </textarea>
                                                    <p class="roboto text-success">Sister's Names:
                                                        @if($sisters)
                                                            @foreach($sisters as $sister)
                                                                {{ $sister->sister_name }},
                                                            @endforeach
                                                        @endif
                                                    </p>
                                                    <span class="f-s-13 text-danger roboto text-capitalize">please separate your sisterss name with comma( , )</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center py-2">
                                            <div class="col-md-6">
                                                <label for="" class="pb-1">Email</label>
                                                <input type="email" wire:model.defer="email" class="form-control" value="{{ isset($existDetails->email) ? $existDetails->email : '' }}">
                                                <input type="hidden" wire:model="auth_email" name="" id="" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="pb-1">Phone</label>
                                                <input type="text" wire:model.defer="phone" value="{{ isset($existDetails->phone) ? $existDetails->phone : '' }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row align-content-center py-2">
                                            <div class="col-md-6">
                                                <label for="">Present Address</label>
                                                <textarea name="" wire:model.defer="present_address" class="form-control" id="" cols="30" rows="2">
                                                    @if($existDetails)
                                                        {{ $existDetails->present_address }}
                                                    @endif
                                                </textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Permanent Address</label>
                                                <textarea name="" wire:model.defer="permanent_address" class="form-control" id="" cols="30" rows="2">
                                                    @if($existDetails)
                                                        {{ $existDetails->permanent_address }}
                                                    @endif
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row py-2 align-content-center">
                                            <div class="col-md-6">
                                                <label for="">Habits</label>
                                                <textarea name="" wire:model.defer="habits" class="form-control" id="" cols="30" rows="2">
                                                    @if($existDetails)
                                                        {{ $existDetails->habits }}
                                                    @endif
                                                </textarea>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="" class="roboto">Profile Image</label> <span class="text-orange">[Required]</span>
                                            <div class="user-details-personal-img pt-1">
                                                @if(isset($existDetails->profile_image))
                                                    <a href="{{ asset($existDetails->profile_image) }}" target="_blank">
                                                        <img src="{{ asset($existDetails->profile_image) }}" style="height: 100px; width: 100px;" alt="">
                                                    </a>

                                                @endif
                                            </div>
                                            <input type="file" wire:model="profile_image" class="form-control mt-2">
                                        </div>
                                        <div class="py-2">
                                            <label for="" class="roboto">Gallery Images</label> <span class="text-orange">[Optional]</span>
                                            <div class="d-grid col-6 mx-auto mt-2">
                                                <p class="text-capitalize text-center text-orange">please input gallery images from menu...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="orelega-one f-s-26 text-success text-center text-capitalize py-2">Educational information</h5>
                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">Primary School</label>
                                        <input type="text" wire:model.lazy="primary_school" value="{{ isset($existDetails->primary_school) ? $existDetails->primary_school : '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">High School</label>
                                        <input type="text" wire:model.lazy="high_school" value="{{ isset($existDetails->high_school) ? $existDetails->high_school : '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">HSC (College Name)</label>
                                        <input type="text" wire:model.lazy="hsc_college_name" value="{{ isset($existDetails->hsc_college_name) ? $existDetails->hsc_college_name : '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">Honours (Institute Name)</label>
                                        <input type="text" wire:model.lazy="honours_college_name" value="{{ isset($existDetails->honours_college_name) ? $existDetails->honours_college_name : '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">Masters (Institute Name)</label>
                                        <input type="text" wire:model.lazy="masters_college_name" value="{{ isset($existDetails->masters_college_name) ? $existDetails->masters_college_name : '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">Company Name (For Job Holders)</label>
                                        <input type="text" wire:model.lazy="company_name" value="{{ isset($existDetails->company_name) ? $existDetails->company_name : '' }}" class="form-control">
                                    </div>
                                </div>
                                <h5 class="orelega-one f-s-26 text-success text-center text-capitalize py-2">Contact and Social information</h5>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group py-2" title="Phone Number">
                                            <span class="input-group-text bg-orange"><i class="fas fa-phone text-white"></i></span>
                                            <input type="text" wire:model.lazy="phone_2" value="{{ isset($existDetails->phone_2) ? $existDetails->phone_2 : '' }}" class="form-control">
                                        </div>
                                        <div class="input-group py-2" title="Email Address">
                                            <span class="input-group-text bg-orange"><i class="fas fa-file-medical text-white"></i></span>
                                            <input type="text" wire:model.lazy="email_2" value="{{ isset($existDetails->email_2) ? $existDetails->email_2 : '' }}" class="form-control">
                                        </div>
                                        <div class="input-group py-2" title="Facebook">
                                            <span class="input-group-text bg-orange"><i class="fab fa-facebook text-white"></i></span>
                                            <input type="text" wire:model.lazy="facebook" value="{{ isset($existDetails->facebook) ? $existDetails->facebook : '' }}" class="form-control">
                                        </div>
                                        <div class="input-group py-2" title="Whatsapp">
                                            <span class="input-group-text bg-orange"><i class="fab fa-whatsapp text-white"></i></span>
                                            <input type="text" wire:model.lazy="whatsapp" value="{{ isset($existDetails->whatsapp) ? $existDetails->whatsapp : '' }}" class="form-control">
                                        </div>


                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group py-2" title="Skype">
                                            <span class="input-group-text bg-orange"><i class="fab fa-skype text-white"></i></span>
                                            <input type="text" wire:model.lazy="skype" value="{{ isset($existDetails->skype) ? $existDetails->skype : '' }}" class="form-control">
                                        </div>
                                        <div class="input-group py-2" title="Twitter">
                                            <span class="input-group-text bg-orange"><i class="fab fa-twitter text-white"></i></span>
                                            <input type="text" wire:model.lazy="twitter" value="{{ isset($existDetails->twitter) ? $existDetails->twitter : '' }}" class="form-control">
                                        </div>
                                        <div class="input-group py-2" title="Instagram">
                                            <span class="input-group-text bg-orange"><i class="fab fa-instagram text-white"></i></span>
                                            <input type="text" wire:model.lazy="instagram" value="{{ isset($existDetails->instagram) ? $existDetails->instagram : '' }}" class="form-control">
                                        </div>
                                        <div class="input-group py-2" title="Linkedin">
                                            <span class="input-group-text bg-orange"><i class="fab fa-linkedin text-white"></i></span>
                                            <input type="text" wire:model.lazy="linkedin" value="{{ isset($existDetails->linkedin) ? $existDetails->linkedin : '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col">
                                        <div class="d-grid col-6 mx-auto">
                                            <input type="submit" wire:click.prevent="store()" class="btn btn-success btn-block" id="userInfoSaveBtn" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{--                            <div wire:loading.delay>--}}
                        {{--                                Processing Data...--}}
                        {{--                            </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
