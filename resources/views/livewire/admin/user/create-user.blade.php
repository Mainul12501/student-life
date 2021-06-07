<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container-fluid">
        <!-- File export -->
        <div class="row">
            <div class="col-12">
                <div class="card  border">
                    <div class="card-header bg-dark text-white font-14" >Create User</div>
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
                                <label for="name">User Name :</label>
                                <input type="text" class="form-control" wire:model="name">
                            </div>
                            <div class="form-group">
                                <label for="name">User Email :</label>
                                <input type="text" class="form-control" wire:model="email"/>
                            </div>
                            <div class="form-group">
                                <label for="name">User Password :</label>
                                <input type="text" class="form-control" wire:model="password"/>
                            </div>
                            <div class="form-group">
                                <label for="name">User Role :</label>
                                <select name="" class="form-control" id="" wire:model="role">
                                    <option value="">Select a role</option>
                                    @foreach($roles as $role)
                                        <option style="border: 1px solid lightgrey" value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" wire:click.prevent="store()" class="btn btn-outline-dark btn-block font-18" value="Create" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
