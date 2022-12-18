<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @if(count($comments)>0)
        <h3 class="fw-bold f-s-26 text-success text-center orelega-one ms-4 pb-4 text-capitalize">reviews about {{ $user->name }} </h3>
        @foreach($comments as $comment)
            <div class="row py-1">
                <div class="col-12">

                    <div class="d-flex flex-row">
                        <div class="d-flex flex-column">

                            <img class="img-fluid bg-danger" style="border-radius: 50%; height: 50px; vertical-align: middle !important;" src="{{ $comment->comment_by_image != '' ? asset($comment->comment_by_image) : asset('/').'front/img/user.png' }}" alt="">
                        </div>
                        <div class="d-flex flex-column w-100" style="margin-top: 5px;">
                            <h4 class="fw-bold f-s-20 orelega-one ms-4">{{ $comment->comment_by_name }}</h4>
                            <p style="text-align: justify;" class="roboto f-s-16 ms-4">{{ $comment->comments }}</p>
                            @if($comment->comment_image != null)
                                <div class="d-grid col-6 mx-auto">
                                    <img class="img-fluid" src="{{ asset($comment->comment_image) }}" style="height: 250px" alt="">
                                </div>

                            @endif
                            @if($comment->comment_audio != null)
                                <audio controls src="{{ asset('storage/'.$comment->comment_audio) }}" >
                                    Audio Clip
                                </audio>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--                    <div class="row py-1">--}}
        {{--                        <div class="col-12">--}}
        {{--                            <div class="d-flex flex-row">--}}
        {{--                                <div class="d-flex flex-column">--}}
        {{--                                    <img class="img-fluid" style="border-radius: 50%; height: 50px; vertical-align: middle !important;" src="https://media.istockphoto.com/photos/picturesque-morning-in-plitvice-national-park-colorful-spring-scene-picture-id1093110112?k=6&m=1093110112&s=612x612&w=0&h=uBH7Rj-Ew_ixjunRrD_U7alq2ZUPJ_5XgMpe9xO52QQ=" alt="">--}}
        {{--                                </div>--}}
        {{--                                <div class="d-flex flex-column w-100" style="margin-top: 5px;">--}}
        {{--                                    <h4 class="fw-bold f-s-20 orelega-one ms-4">Name</h4>--}}
        {{--                                    <p style="text-align: justify;" class="roboto f-s-16 ms-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit non sequi, asperiores ipsam quo mollitia, veritatis magnam est excepturi veniam voluptatum repellat! Assumenda, laudantium harum! Ullam illum voluptas optio neque.</p>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        @if(count($comments)>6)
            <div class="row py-2">
                <div class="col-12">
                    <div class="d-grid mx-auto col-5">
                        <a href="{{ route('user-comments', ['id' => $user->id, 'name' => str_replace(' ', '-', $user->name)]) }}" class="btn btn-orange text-capitalize">view all comments about {{ $user->name }} </a>
                    </div>
                </div>
            </div>
        @endif
    @else
        <h3 class="fw-bold f-s-26 text-danger text-center orelega-one ms-4 pb-4 text-capitalize">There is no review for {{ $user->name }} </h3>
    @endif
</div>
