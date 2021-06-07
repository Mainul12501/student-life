<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container-fluid">
        <!-- File export -->
        <div class="row">
            <div class="col-12">
                {{--                table--}}

                <div class="card">
                        <div class="card-text p-3">
                            <a class="text-primary font-20">All Contact and Suggestion List</a>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Suggestions</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @php($i=1)
                                    <tbody>
                                    @foreach($suggestions as $com)
                                        <tr>
                                            <td>{{$i++}}</td>

                                            <td>{{ $com->name }}</td>
                                            <td>{{ $com->email }}</td>
                                            <td>{{ $com->phone }}</td>
                                            <td>{{ $com->text }}</td>
                                            <td>
                                                <a onclick="return confirm('Are you sure..?? ') || event.stopImmediatePropagation()" wire:click.prevent="del({{ $com->id }})" class="btn btn-outline-danger btn-sm" title="Delete" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($suggestions)
                                    <div class="float-right mr-5">
                                        {{ $suggestions->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
