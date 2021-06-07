<!-- isotop gallary Image section -->
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="fw-bolder text-center"><span class="f-s-42 orelega-one" style="border-bottom: 3px solid violet;">Image Gallary</span></h3>

                <div class="py-4">
                    <div class="isotop-box">
                        <div class="mx-auto text-center group">
                            @foreach($titleNames as $key=>$titleName)
                                @foreach($displayNames as $val =>$displayName)
                                    @if($key == $val)
                                    <button data-filter="{{ '.'.$titleName }}" type="button" class="btn btn-outline-primary {{ $key == 0 ? 'active' : '' }}">{{ $displayName }}</button>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div class="isotope-item-box">
                            @foreach($homeImagePopUps as $image)
                            <div class="item {{ $image->title }}">
                                <a href="{{ asset($image->big_image) }}" class="popup">
                                    <img src="{{ asset($image->mini_image) }}" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('gallery-page') }}" class=" btn btn-warning mx-auto" >View More Images</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
