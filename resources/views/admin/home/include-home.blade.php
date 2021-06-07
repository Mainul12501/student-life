<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid" style="min-height: 800px">
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <i class="mdi mdi-emoticon font-20 text-muted"></i>
                                <p class="font-16 m-b-5">Total User</p>
{{--                                <p class="font-16 m-b-5">New Clients</p>--}}
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">{{ count(\App\Models\User::all()) }}</h1>
{{--                                <h1 class="font-light text-right">23</h1>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;" aria-valuenow="{{ count(\App\Models\User::all()) }}" aria-valuemin="0" aria-valuemax="500"></div>
{{--                            <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <i class="mdi mdi-image font-20  text-muted"></i>
{{--                                <p class="font-16 m-b-5">New Projects</p>--}}
                                <p class="font-16 m-b-5">Total Teachers</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">{{ count(\App\Models\User::where('role', 'teacher')->get()) }}</h1>
{{--                                <h1 class="font-light text-right">169</h1>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="{{ count(\App\Models\User::where('role', 'teacher')->get()) }}" aria-valuemin="0" aria-valuemax="10"></div>
{{--                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <i class="mdi mdi-currency-eur font-20 text-muted"></i>
                                <p class="font-16 m-b-5">Total Friends</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">{{ count(\App\Models\User::where('role', 'user')->get()) }}</h1>
{{--                                <h1 class="font-light text-right">157</h1>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;" aria-valuenow="{{ count(\App\Models\User::where('role', 'user')->get()) }}" aria-valuemin="0" aria-valuemax="500"></div>
{{--                            <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->

    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Comments</h4>
                </div>
                <div class="comment-widgets scrollable" style="">
                    @php
                        $comments = \App\Models\admin\UserComments::orderBy('id')->take(6)->get();
                    @endphp
                    <!-- Comment Row -->
                    @if(isset($comments))
                        @foreach($comments as $comment)
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">
                                    <img src="{{ isset($comment->profile_image) ? asset($comment->profile_image) : asset('/').'admin/assets/images/users/1.jpg' }}" alt="user-{{ $comment->comment_to_name }}" width="50" class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">

                                    <h6 class="font-medium">{{ $comment->comment_by_name }}</h6>
                                    <span class="m-b-15 d-block">{{ $comment->comments }} </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">{{ $comment->updated_at }}</span>
                                        <span class="label label-rounded label-primary">Approved</span>
                                        <span class="action-icons">
                                                        <a href="javascript:void(0)">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <i class="ti-check"></i>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <i class="ti-heart"></i>
                                                        </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2">
                                <img src="{{ asset('/') }}admin/assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">James Anderson</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-primary">Pending</span>
                                    <span class="action-icons">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-check"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart"></i>
                                                </a>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="{{ asset('/') }}admin/assets/images/users/4.jpg" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">Michael Jorden</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer ">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-success label-rounded">Approved</span>
                                    <span class="action-icons active">
                                                    <a href="javascript:void(0)">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <i class="icon-close"></i>
                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <i class="ti-heart text-danger"></i>
                                                    </a>
                                                </span>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="{{ asset('/') }}admin/assets/images/users/5.jpg" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Johnathan Doeting</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-danger">Rejected</span>
                                    <span class="action-icons">
                                                    <a href="javascript:void(0)">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <i class="ti-check"></i>
                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <i class="ti-heart"></i>
                                                    </a>
                                                </span>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2">
                                <img src="{{ asset('/') }}admin/assets/images/users/2.jpg" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Steve Jobs</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-primary">Pending</span>
                                    <span class="action-icons">
                                                    <a href="javascript:void(0)">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <i class="ti-check"></i>
                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <i class="ti-heart"></i>
                                                    </a>
                                                </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- column -->
{{--        <div class="col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center p-b-15">--}}
{{--                        <div>--}}
{{--                            <h4 class="card-title m-b-0">To Do List</h4>--}}
{{--                        </div>--}}
{{--                        <div class="ml-auto">--}}
{{--                            <div class="dl">--}}
{{--                                <select class="custom-select border-0 text-muted">--}}
{{--                                    <option value="0" selected="">August 2018</option>--}}
{{--                                    <option value="1">May 2018</option>--}}
{{--                                    <option value="2">March 2018</option>--}}
{{--                                    <option value="3">June 2018</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="todo-widget scrollable" style="height:422px;">--}}
{{--                        <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">--}}
{{--                            <li class="list-group-item todo-item" data-role="task">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck">--}}
{{--                                    <label class="custom-control-label todo-label" for="customCheck">--}}
{{--                                        <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="badge badge-pill badge-success float-right">Project</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item todo-item" data-role="task">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
{{--                                    <label class="custom-control-label todo-label" for="customCheck1">--}}
{{--                                        <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</span><span class="badge badge-pill badge-danger float-right">Project</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}

{{--                            </li>--}}
{{--                            <li class="list-group-item todo-item" data-role="task">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck2">--}}
{{--                                    <label class="custom-control-label todo-label" for="customCheck2">--}}
{{--                                        <span class="todo-desc">Ipsum is simply dummy text of the printing</span> <span class="badge badge-pill badge-info float-right">Project</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}

{{--                            </li>--}}
{{--                            <li class="list-group-item todo-item" data-role="task">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck3">--}}
{{--                                    <label class="custom-control-label todo-label" for="customCheck3">--}}
{{--                                        <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="badge badge-pill badge-info float-right">Project</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item todo-item" data-role="task">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck4">--}}
{{--                                    <label class="custom-control-label todo-label" for="customCheck4">--}}
{{--                                        <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</span> <span class="badge badge-pill badge-purple float-right">Project</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item todo-item" data-role="task">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck5">--}}
{{--                                    <label class="custom-control-label todo-label" for="customCheck5">--}}
{{--                                        <span class="todo-desc">Ipsum is simply dummy text of the printing</span> <span class="badge badge-pill badge-success float-right">Project</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item todo-item" data-role="task">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck6">--}}
{{--                                    <label class="custom-control-label todo-label" for="customCheck6">--}}
{{--                                        <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="badge badge-pill badge-primary float-right">Project</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
