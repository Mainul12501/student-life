@extends('front.master')
@section('title')
    All Comments
@endsection
@section('body')
    <!-- comments about students section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="orelega-one text-center text-capitalize f-s-36 text-success">friends & teachers All reviews</h4>
                </div>
            </div>
{{--            <div class="row py-3">--}}
{{--                <div class="col-sm-3">--}}
{{--                    <span class="roboto text-capitalize text-orange f-s-16">reviewed to: target name</span>--}}
{{--                    <img src="{{ asset('/') }}front/img/home-owl-carousal/1.jpg" class="student-review-img img-fluid" alt="">--}}
{{--                </div>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <p class="text-justify mt-3">--}}
{{--                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore consequatur laboriosam optio voluptatibus temporibus dignissimos vitae deleniti? Hic quis dignissimos soluta magni earum beatae illum reiciendis! Quaerat ullam quisquam sapiente.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="col-sm-3">--}}
{{--                    <span class="roboto text-capitalize text-orange f-s-16">reviewed by: host name</span>--}}
{{--                    <img src="{{ asset('/') }}front/img/home-owl-carousal/1.jpg" class="student-review-img img-fluid" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
            {{--        <div class="row py-3">--}}
            {{--            <div class="col-sm-3">--}}
            {{--                <span class="roboto text-capitalize text-orange f-s-16">reviewed to: target name</span>--}}
            {{--                <img src="{{ asset('/') }}front/img/home-owl-carousal/1.jpg" class="student-review-img img-fluid" alt="">--}}
            {{--            </div>--}}
            {{--            <div class="col-sm-6">--}}
            {{--                <p class="text-justify">--}}
            {{--                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore consequatur laboriosam optio voluptatibus temporibus dignissimos vitae deleniti? Hic quis dignissimos soluta magni earum beatae illum reiciendis! Quaerat ullam quisquam sapiente.--}}
            {{--                </p>--}}
            {{--            </div>--}}
            {{--            <div class="col-sm-3">--}}
            {{--                <span class="roboto text-capitalize text-orange f-s-16">reviewed by: host name</span>--}}
            {{--                <img src="{{ asset('/') }}front/img/home-owl-carousal/1.jpg" class="student-review-img img-fluid" alt="">--}}
            {{--            </div>--}}
            {{--        </div>--}}
{{--            <div class="row py-3">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="d-grid col-4 mx-auto">--}}
{{--                        <a href="" class="btn btn-outline-success">Load More reviews</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <livewire:front.comments.comment />
        </div>
    </section>

@endsection
