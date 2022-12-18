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
                            <button data-filter=".cgc" type="button" class="btn btn-outline-primary">CGC</button>
                            <button data-filter=".mainul" type="button" class="btn  btn-outline-primary">Mainul</button>
                            <!-- <button data-filter="*" type="button" class="btn btn-outline-primary">All</button> -->
                        </div>
                        <div class="isotope-item-box">
                            @foreach($homeImagePopUps as $image)
                            <div class="item {{ $image->title }}">
                                <a href="{{ asset($image->big_image) }}" class="popup">
                                    <img src="{{ asset($image->mini_image) }}" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            @endforeach
                            <div class="item mainul">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/mainul-2.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/mainul-2.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item mainul">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/mainul-3.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/mainul-3.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item mainul">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/mainul-4.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/mainul-4.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item ngtc">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/gro-2.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/gro-2.jpg" class="isotope-img-size" alt="">
                                </a>

                            </div>
                            <div class="item ngtc">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/gro-1.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/gro-1.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item ngtc">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/gro-3.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/gro-3.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item ngtc">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/gro-4.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/gro-4.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item cgc">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/group-2.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/group-2.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item cgc">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/group-1.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/group-1.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item cgc">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/group-3.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/group-3.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                            <div class="item cgc">
                                <a href="{{ asset('/') }}front/img/home-isotop-img/group-4.jpg" class="popup">
                                    <img src="{{ asset('/') }}front/img/home-isotop-img/group-4.jpg" class="isotope-img-size" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="imageGallary.html" class=" btn btn-warning mx-auto" >View More Images</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
