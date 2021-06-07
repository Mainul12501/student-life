@extends('front.master')
@section('title')

@endsection
@section('body')
    <!-- image gallary starts -->
    <section class="py-5" style="min-height: 500px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <ul class="nav nav-pills justify-content-center" id="tab">
                            <li class="nav-item waves-effect waves-light d-grid col-4" role="presentation">
                                <a class="nav-link active text-center" data-bs-toggle="pill" data-bs-target="#image" id="image-tab"  role="tab" aria-controls="image" aria-selected="true">Image</a>
                            </li>
                            <li class="nav-item waves-effect waves-light d-grid col-4" role="presentation">
                                <a class="nav-link text-center" data-bs-toggle="pill" data-bs-target="#audio" id="audio-tab"  role="tab" aria-controls="audio" aria-selected="false">Audio</a>
                            </li>
                            <li class="nav-item waves-effect waves-light d-grid col-4" role="presentation">
                                <a class="nav-link text-center" data-bs-toggle="pill" data-bs-target="#video" id="video-tab"  role="tab" aria-controls="video" aria-selected="false">Video</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="image-tab">
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h2 class="text-center orelega-one fw-bold f-s-36 text-orange">Image Gallary </h2>
                                    </div>
                                </div>
                                <div class="row" id="printImages">
                                    @php($i = 0)
                                    @if(count($gallery)> 0)
                                        @foreach($gallery as $gal)
                                            <div class="col-md-4 col-lg-3 col-sm-6 py-2">
                                                <a href="{{ asset($gal->big_image) }}" class="popup">
                                                    <img src="{{ asset($gal->mini_image) }}" class="gallary-img-size img-fluid" alt="{{ $user->name.'-gallery-image'.$i++ }}">
                                                </a>
                                            </div>
                                        @endforeach

                                    @else
                                        <span class="text-danger f-s-25 text-center orelega-one text-capitalize" style="margin-top: 150px">there's no photo uploaded yet.</span>
                                    @endif

                                </div>
                                @if(count($gallery)>20)
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="d-grid col-4 mx-auto">
                                                <a href="" id="userGalleryLoadMore" class="btn btn-outline-success">Load More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="audio" role="tabpanel" aria-labelledby="audio-tab">
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h2 class="text-center orelega-one fw-bold f-s-36 text-orange">Audio Gallary</h2>
                                    </div>
                                </div>
                                <div class="row" id="">
                                    @php($y = 0)
                                    @if(count($galleryAudios)> 0)
                                        @foreach($galleryAudios as $gal)
                                            <div class="col-md-4 col-lg-3 col-sm-6 py-2">
                                                <audio src="{{ asset('storage/'.$gal->audio_file) }}" controls muted>{{ $y++ }}</audio>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-danger f-s-25 text-center orelega-one text-capitalize" style="margin-top: 150px">there's no Audio uploaded yet.</span>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h2 class="text-center orelega-one fw-bold f-s-36 text-orange">Video Gallary</h2>
                                    </div>
                                </div>
                                <div class="row" >
                                    @php($z = 0)
                                    @if(count($galleryVideos)> 0)
                                        @foreach($galleryVideos as $gal)
                                            <div class="col-md-4 col-lg-3 col-sm-6 py-2">
                                                <video src="{{ asset('storage/'.$gal->video_file) }}" muted height="300px" controls>{{ $z++ }}</video>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-danger f-s-25 text-center orelega-one text-capitalize" style="margin-top: 150px">there's no Video uploaded yet.</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-js')
    <script>
        $('#userGalleryLoadMore').click(function () {
            event.preventDefault();
            $.ajax({
                method : 'GET',
                dataType : 'JSON',
                url : '/get-more-gallery-image',
                success: function (data)
                {
                    // console.log(data);
                    var printImage = $('#printImages');
                    printImage.empty();
                    var i = 0;
                    var div = '';
                    $.each(data, function (key, value) {
                        div += '<div class="col-md-4 col-lg-3 col-sm-6 py-2">';
                        div += '    <a href="'+value.big_image+'" class="popup">';
                        div += '        <img src="'+value.mini_image+'" class="gallary-img-size img-fluid" alt="'+ i++ +'">';
                        div += '    </a>';
                        div += '</div>';
                    })
                    printImage.append(div);
                }
            });
        });
    </script>
@endsection
