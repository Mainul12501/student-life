<div>
    {{-- Be like water. --}}
    <div class="container-fluid" style="min-height: 800px!important;">
        <div class="row">
            <div class="col-12">
                <div class="card  border">
                    <div class="card-header bg-dark text-white font-14" >Request to Change Your Auth Email</div>
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
                                <h5 class="orelega-one text-success text-center text-capitalize f-s-26">Input your data here</h5>

                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">Your Current Login Email</label>
                                        <input type="text" wire:model.lazy="auth_email" value="{{ isset($auth_email) ? $auth_email : \Illuminate\Support\Facades\Auth::user()->email }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">Requested Email Address</label>
                                        <input type="text" wire:model.lazy="req_email" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">Requested User Name</label>
                                        <input type="text" wire:model.lazy="req_name" value="" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pb-1">Change Your Password?</label>
                                        <p class="text-justify">
                                            If you want to change your password, You can change your pass <a href="{{ route('password.request') }}" class="text-orange">here</a>.
                                        </p>
                                    </div>
                                </div>

                                <div class="row pt-4">
                                    <div class="col">
                                        <div class="d-grid col-6 mx-auto">
                                            <input type="submit" wire:click.prevent="store()" class="btn btn-success btn-block"  value="Save">
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
