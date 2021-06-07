<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container-fluid" style="min-height: 800px;">
        <!-- File export -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <a href="" class="btn btn-{{ $openForm == false ? 'success' : 'danger' }} " wire:click.prevent="$toggle('openForm')">{{ $openForm == false ? 'Open' : 'close' }} Comment form</a>
{{--                            <a href="" class="btn btn-{{ $openForm == false ? 'success' : 'danger' }} " wire:click.prevent="{{ $openForm == false ? 'openform()' : 'closeform()' }}">{{ $openForm == false ? 'Open' : 'close' }} form</a>--}}
                        </div>
                    </div>
                </div>


                {{--                form--}}
                @if($openForm == true)

                    <div class="card  border">
                        <div class="card-header bg-dark text-white font-14" >Comment Here</div>
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
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name">Commented to :</label>
                                        <select name="" wire:model.lazy="comment_to" wire:change="getUser($event.target.value)" class="form-control" id="">
                                            <option value="">Select a user</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ isset($user_image) ? asset($user_image) : 'https://pickaface.net/gallery/avatar/unr_edwinavator_170412_0152_yoidv.png' }}" class="img-fluid" style="height: 100px;" alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Comments</label>
                                    <textarea name="editor1" class="form-control" wire:model.lazy="comments" id="" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex flex-row ml-3">
                                        <div class="d-flex flex-column w-100 ml-4" style="margin-top: 11px;">
                                            <label for="" class="ml-2 fw-bold">Image for comment</label>
                                            <input type="file" class="form-control" accept="image/*" wire:model.defer="image">
                                        </div>
                                        <div class="d-flex flex-column w-100 ml-4" style="margin-top: 11px;">
                                            <label for="" class="ml-2 fw-bold">Audio for comment</label>
                                            <input type="file" class="form-control" accept="audio/*" wire:model.defer="audio">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" wire:click.prevent="store()" class="btn btn-outline-dark btn-block font-18" value="Create" />
                                </div>

                            </form>
                        </div>
                    </div>
                @endif

                {{--                table--}}
                @if($openTable == true)
                    <div class="card">
                        <div class="card-text p-3">
                            <a class="text-primary font-20">{{ Auth::user()->role  == 'admin' ? 'All Comments List' : 'Your Comments List' }}</a>
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
                            <div class="table-responsive">
                                <table class="table table-bordered font-12" id="file_export">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        @if(Auth::user()->role ==  'admin')
                                        <th>Comment By</th>
                                        @endif
                                        <th>Comment To</th>
                                        <th>Comments</th>
                                        <th>Image</th>
                                        <th>Audio</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @php($i=1)
                                    <tbody>
                                    @foreach($coms as $com)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            @if(Auth::user()->role ==  'admin')
                                                <?php
                                                if ($com->comment_by == 0)
                                                {
                                                    $commentBy  = \App\Models\Admin::orderBy('id', 'ASC')->first()->name;
                                                } else {
                                                    $commentBy  = \App\Models\User::findOrFail($com->comment_by)->name;
                                                }
                                                ?>
                                                <td>{{ $commentBy }}</td>
                                            @endif
                                            <?php
                                                $commentTo  = \App\Models\User::findOrFail($com->comment_to)->name;
                                            ?>
                                            <td>{{ $commentTo }}</td>
                                            <td>{{ $com->comments }}</td>
                                            <td>
                                                <audio src="{{ asset('storage/'.$com->comment_audio) }}" muted controls>audio</audio>
                                            </td>
                                            <td>
                                                <video src="{{ asset('storage/'.$com->comment_video) }}" controls muted>video</video>
                                            </td>
                                            <td>

                                                <a href="" wire:click.prevent="edit({{ $com->id }})" class="btn btn-outline-primary btn-sm" title="Edit" ><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Are you sure..?? ') || event.stopImmediatePropagation()" wire:click.prevent="del({{ $com->id }})" class="btn btn-outline-danger btn-sm" title="Delete" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($coms)
                                    <div class="float-right mr-5">
                                        {{ $coms->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
