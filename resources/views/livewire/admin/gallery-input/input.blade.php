<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container-fluid" style="min-height: 800px;">
        <!-- File export -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <a href="" class="btn btn-{{ $openForm == false ? 'success' : 'danger' }} " wire:click.prevent="$toggle('openForm')">{{ $openForm == false ? 'Open' : 'close' }} form</a>
                            {{--                            <a href="" class="btn btn-{{ $openForm == false ? 'success' : 'danger' }} " wire:click.prevent="{{ $openForm == false ? 'openform()' : 'closeform()' }}">{{ $openForm == false ? 'Open' : 'close' }} form</a>--}}
                        </div>
                    </div>
                </div>


                {{--                form--}}
                @if($openForm == true)

                    <div class="card  border">
                        <div class="card-header bg-dark text-white font-14" >Add Gallery Image Here</div>
                        <div class="card-body">
                            <div id="errorMsgClose" class="text-justify">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @if($errors->count() == 1)
                                            {{$errors->first()}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        @else
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
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

                            <form action="" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Event Name :</label>
                                    <input type="text" wire:model.lazy="event_name" class="form-control" required />
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="">Images</label>
                                        <input type="file" class="form-control-file" wire:model="images" multiple accept="image/*" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Audio</label>
                                        <input type="file" class="form-control-file" wire:model="audios" multiple accept="audio/*" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Video</label>
                                        <input type="file" class="form-control-file" wire:model="videos" multiple accept="video/*" />
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input type="submit" wire:click.prevent="store()" class="btn btn-outline-dark btn-block font-18" value="Create" />
                                </div>
                            </form>
                            <div wire:loading>
                                <h3 class="text-center text-success">Processing Data...</h3>
                            </div>
                        </div>
                    </div>
                @endif

                {{--                table--}}

                    <div class="card">
                        <div class="card-text p-3">
                            <a class="text-primary font-20">All Gallery Image List</a>
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
{{--                                <div class="float-right">--}}
{{--                                    <label for="search">Search : </label>--}}
{{--                                    <input type="search" class="" wire:model="search" style="border: 1px solid lightgrey; height: 36px; border-radius: 5px;" placeholder="Search Here...">--}}
{{--                                </div>--}}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered font-12" id="file_export">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Event Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @php($i=1)
                                    @php($z=1)
                                    <tbody>
                                    @foreach($homeGallerySliderImages as $com)
                                        <tr>
                                            <td>{{$i++}}</td>

                                            <td>{{ $com->user->name }}</td>
                                            <td>{{ $com->event_name }}</td>
                                            <td>
                                                <img src="{{ asset($com->mini_image) }}" style="height: 100px" alt="{{ $com->user->name.'-'.$z++ }}">
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are you sure..?? ') || event.stopImmediatePropagation()" wire:click.prevent="del({{ $com->id }})" class="btn btn-outline-danger btn-sm" title="Delete" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($homeGallerySliderImages)
                                    <div class="float-right mr-5">
                                        {{ $homeGallerySliderImages->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
