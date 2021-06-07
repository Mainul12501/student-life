<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="container-fluid">
        <!-- File export -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="">
                            {{--                            <a href="" class="btn btn-{{ $openForm == false ? 'success' : 'danger' }} " wire:click.prevent="opps()">{{ $openForm == false ? 'Open' : 'close' }} form</a>--}}
                            <a href="" class="btn btn-{{ $openForm == false ? 'success' : 'danger' }} " wire:click.prevent="{{ $openForm == false ? 'openform()' : 'closeform()' }}">{{ $openForm == false ? 'Open' : 'close' }} form</a>
                        </div>
                    </div>
                </div>


                {{--                form--}}
                @if($openForm == true)

                    <div class="card  border">
                        <div class="card-header bg-dark text-white font-14" >Sub Category Info</div>
                        <div class="card-body">
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

                            <form action="" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Sub Category Name :</label>
                                    <input type="text" class="form-control" wire:model="name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Category Name :</label>
                                    <select name="" class="form-control" id="" wire:model="category_id">
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Status :</label>
                                    <input type="radio" class="" value="1" wire:model="status"/> Published
                                    <input type="radio" class="" value="0" wire:model="status"/> Unpublished
                                </div>
                                <div class="form-group">
                                    <input type="submit" wire:click.prevent="store()" class="btn btn-outline-dark btn-block font-18" value="{{ isset($subCategoryId)   ? 'Update' : 'Create' }}" />
                                </div>

                            </form>
                        </div>
                    </div>
                @endif

                {{--                table--}}
                @if($openTable == true)
                    <div class="card">
                        <div class="card-text p-3">
                            <a class="text-primary font-20">All Category List</a>
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
                            <div class="table-responsive">
                                <table class="table table-bordered font-12" id="file_export">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>Category Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @php($i=1)
                                    <tbody>
                                    @foreach($subCategories as $subCategory)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$subCategory->name}}</td>
                                            <td>{{$subCategory->category->name}}</td>
                                            <td>{{$subCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
                                                <a href="" wire:click.prevent="changeStatus({{ $subCategory->id }})" class="btn btn-outline-{{ $subCategory->status == 1 ? 'success' : 'warning' }} btn-sm" title="Status - {{ $subCategory->status ==1 ? 'Published' : 'Unpublished' }}"><i class="fa fa-arrow-{{ $subCategory->status ==1 ? 'down' : 'up' }}"></i></a>
                                                <a href="" wire:click.prevent="edit({{ $subCategory->id }})" class="btn btn-outline-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="" wire:click.prevent="del({{ $subCategory->id }})" class="btn btn-outline-danger btn-sm" type="Delete" onclick="return confirm('Are you sure..?? ')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
