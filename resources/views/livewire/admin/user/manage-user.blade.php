<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container-fluid">
        <!-- File export -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="">
                            {{--                            <a href="" class="btn btn-{{ $openForm == false ? 'success' : 'danger' }} " wire:click.prevent="opps()">{{ $openForm == false ? 'Open' : 'close' }} form</a>--}}
                            <a href="" class="btn btn-{{ $openForm == true ? 'danger' : '' }} " wire:click.prevent="{{ $openForm == true ? 'closeform()' : '' }}">{{ $openForm == true ? 'close form' : '' }}</a>
{{--                            <a href="#" wire:click.prevent="$toggle('openForm')" class="btn btn-success">Add New Category</a>--}}
                        </div>
                    </div>
                </div>


                {{--                form--}}
                @if($openForm == true)

                    <div class="card  border">
                        <div class="card-header bg-dark text-white font-14" >User Informations</div>
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
                                                    <input type="text" wire:model.defer="name" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="pb-1">Nick Name</label>
                                                    <input type="text" wire:model.defer="nick_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row align-items-center py-2">
                                                <div class="col-md-6">
                                                    <label for="" class="pb-1">Father's Name</label>
                                                    <input type="text" wire:model.defer="father_name" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="pb-1">Mother's Name</label>
                                                    <input type="text" wire:model.defer="mother_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="" class="">Have Brothers?</label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="radio" wire:model.defer="have_brother" name="bros" id="broYes" value="1"> Yes
                                                            <input type="radio" wire:model.defer="have_brother" checked name="bros" id="broNo" value="0"> No
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="" class="col">Have Sisters?</label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="radio" wire:model.defer="have_sister" name="sis" id="sisYes" value="1"> Yes
                                                            <input type="radio" wire:model.defer="have_sister" checked name="sis" id="sisNo" value="0"> No
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row py-2 bro-sis-name " >
                                                <div class="col-md-6">
                                                    <div class="" id="broNameField">
                                                        <label for="">Brother's Names</label>
                                                        <textarea name="" wire:model="brother_name" class="form-control" id="" cols="30" rows="2"></textarea>
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
                                                    <div class="" id="sisNameField">
                                                        <label for="">Sister's Names</label>
                                                        <textarea name="" wire:model="sister_name" class="form-control" id="" cols="30" rows="2"></textarea>
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
                                                    <input type="email" wire:model.defer="email" class="form-control">
                                                    <input type="hidden" wire:model="auth_email" name="" id="" value="{{ isset($auth_email) ? $auth_email : '' }}">
                                                    <input type="hidden" wire:model="user_id" name="" id="" value="{{ isset($user_id) ? $user_id : '' }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="pb-1">Phone</label>
                                                    <input type="text" wire:model.defer="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row align-content-center py-2">
                                                <div class="col-md-6">
                                                    <label for="">Present Address</label>
                                                    <textarea name="" wire:model.defer="present_address" class="form-control" id="" cols="30" rows="2"></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Permanent Address</label>
                                                    <textarea name="" wire:model.defer="permanent_address" class="form-control" id="" cols="30" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="row py-2 align-content-center">
                                                <div class="col-md-6">
                                                    <label for="">Habits</label>
                                                    <textarea name="" wire:model.defer="habits" class="form-control" id="" cols="30" rows="2"></textarea>
                                                </div>
                                                <div class="col-md-6"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="" class="roboto">Profile Image</label> <span class="text-orange">[Required]</span>
                                                <div class="user-details-personal-img pt-1">
                                                    @if(isset($profile_image))
                                                        <img src="{{ asset($profile_image) }}" style="height: 100px; width: 100px;" alt="profile_image">
                                                    @endif
                                                </div>
                                                <input type="file" wire:model="profile_image" class="form-control mt-2">
                                            </div>
                                            <div class="py-2">
                                                <label for="" class="roboto">Gallery Images</label> <span class="text-orange">[Optional]</span>
                                                <input type="file" wire:model="gallery_image" style="display: none" class="form-control py-2 show-me hide-me" multiple>
                                                <div class="d-grid col-6 mx-auto mt-2">
{{--                                                    <a href="{{route('user-gallery')}}" wire:click.prevent="showUserGallery({{ $user_id }})" class="btn btn-orange">View All Images</a>--}}
                                                    <p class="text-capitalize text-center text-orange">please input gallery images from menu...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="orelega-one f-s-26 text-success text-center text-capitalize py-2">Educational information</h5>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <label for="" class="pb-1">Primary School</label>
                                            <input type="text" wire:model.defer="primary_school" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="pb-1">High School</label>
                                            <input type="text" wire:model.defer="high_school" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <label for="" class="pb-1">HSC (College Name)</label>
                                            <input type="text" wire:model.defer="hsc_college_name" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="pb-1">Honours (Institute Name)</label>
                                            <input type="text" wire:model.defer="honours_college_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <label for="" class="pb-1">Masters (Institute Name)</label>
                                            <input type="text" wire:model.defer="masters_college_name" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="pb-1">Company Name (For Job Holders)</label>
                                            <input type="text" wire:model.defer="company_name" class="form-control">
                                        </div>
                                    </div>
                                    <h5 class="orelega-one f-s-26 text-success text-center text-capitalize py-2">Contact and Social information</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="input-group py-2" title="Phone Number">
                                                <span class="input-group-text bg-orange"><i class="fas fa-phone text-white"></i></span>
                                                <input type="text" wire:model.defer="phone_2" class="form-control">
                                            </div>
                                            <div class="input-group py-2" title="Email Address">
                                                <span class="input-group-text bg-orange"><i class="fas fa-file-medical text-white"></i></span>
                                                <input type="text" wire:model.defer="email_2" class="form-control">
                                            </div>
                                            <div class="input-group py-2" title="Facebook">
                                                <span class="input-group-text bg-orange"><i class="fab fa-facebook text-white"></i></span>
                                                <input type="text" wire:model.defer="facebook" class="form-control">
                                            </div>
                                            <div class="input-group py-2" title="Whatsapp">
                                                <span class="input-group-text bg-orange"><i class="fab fa-whatsapp text-white"></i></span>
                                                <input type="text" wire:model.defer="whatsapp" class="form-control">
                                            </div>


                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="input-group py-2" title="Skype">
                                                <span class="input-group-text bg-orange"><i class="fab fa-skype text-white"></i></span>
                                                <input type="text" wire:model.defer="skype" class="form-control">
                                            </div>
                                            <div class="input-group py-2" title="Twitter">
                                                <span class="input-group-text bg-orange"><i class="fab fa-twitter text-white"></i></span>
                                                <input type="text" wire:model.defer="twitter" class="form-control">
                                            </div>
                                            <div class="input-group py-2" title="Instagram">
                                                <span class="input-group-text bg-orange"><i class="fab fa-instagram text-white"></i></span>
                                                <input type="text" wire:model.defer="instagram" class="form-control">
                                            </div>
                                            <div class="input-group py-2" title="Linkedin">
                                                <span class="input-group-text bg-orange"><i class="fab fa-linkedin text-white"></i></span>
                                                <input type="text" wire:model.defer="linkedin" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-4">
                                        <div class="col">
                                            <div class="d-grid col-6 mx-auto">
                                                <input type="submit" wire:click.prevent="store()" class="btn btn-success btn-block" id="userInfoSaveBtn" value="{{ isset($userDetailsId)   ? 'Update' : 'Create' }}">
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
                @endif

                {{--                table--}}
                @if($openTable == true)
                    <div class="card">
                        <div class="card-text p-3">
                            <a class="text-primary font-20">All User List</a>
                        </div>
                        <div class="card-body">
                            <div class="card-text text-center">
                                @if($message = Session::get('message'))
                                    <div class="alert alert-danger alert-dismissible fade show py-2" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-5">
                                <div style="" class="float-left"><label>
                                        Show<select name="" class="form-control" id="" wire:model="entries">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label> entries
                                </div>
                                <div class="float-right">
                                    <label for="search">Search : </label>
                                    <input type="search" class="" wire:model="search" style="border: 1px solid lightgrey; height: 36px; border-radius: 5px;" placeholder="Search Here...">
                                </div>
                            </div>
                            <div class="table-responsive" style="min-height: 500px">
                                <table class="table table-bordered font-12" id="file_export">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
{{--                                        <th>Category Status</th>--}}
                                        <th>Role</th>
                                        <th>Change Data</th>
                                        <th>Req. Name</th>
                                        <th>Req. Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @php($i=1)
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <a href="" onclick="return confirm('Want to change role?? ')" wire:click.prevent="changeRole({{ $user->id }})">{{$user->role}}</a>
                                            </td>
                                            <td>{{ $user->is_requested	== 1 ? 'Yes' : 'No' }}</td>
                                            <td>{{ $user->req_name }}</td>
                                            <td>{{ $user->req_email }}</td>
                                            <td>
                                                <a href="" wire:click.prevent="edit({{ $user->id }})" class="btn btn-outline-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <button type="button" onclick="return confirm('Are you sure..?? ') || event.stopImmediatePropagation()" wire:click.prevent="del({{ $user->id }})" class="btn btn-outline-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
                                                @if($user->is_requested	== 1)
                                                    <a href="" onclick="return confirm('Are you sure..?? ') || event.stopImmediatePropagation()" wire:click.prevent="changeEmail({{ $user->id }})" class="btn btn-outline-danger btn-sm" title="Change Email"><i class="mdi mdi-account-check"></i></a>
                                                    <a href="" onclick="return confirm('Are you sure..?? ') || event.stopImmediatePropagation()" wire:click.prevent="delchangeReq({{ $user->id }})" class="btn btn-outline-danger btn-sm" title="Delete Change Email Request"><i class="mdi mdi-account-remove"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($users)
                                    <div class="float-right mr-5">
                                        {{ $users->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if($openGallery  == true)
                    <div class="card" wire:ignore.self>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="text-center orelega-one fw-bold f-s-36 text-orange">Gallary</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="sticky-top ">
                                    <button type="button" class="btn btn-danger float-right" wire:click.prevent="closeUserGallery()">Close</button>
                                </div>
                                @php($i = 0)
                                @foreach($userGalleryImage as $img)
                                <div class="col-md-4 col-lg-3 col-sm-6 py-2">
                                    <a href="{{ asset($img->big_image) }}" class="popup">
                                        <img src="{{ asset($img->mini_image) }}" class="gallary-img-size img-fluid" alt="gallery-image{{ $i++ }}">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-grid col-4 mx-auto">
                                        <a href="" class="btn btn-outline-success" wire:click.prevent="closeUserGallery()">Close Gallery</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
