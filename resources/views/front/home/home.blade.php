@extends('front.master')
@section('title')
    Home
@endsection
@section('extra-css')

@endsection
@section('body')
    @include('front.home.include-slider')
    @include('front.home.teachers-speech')
    @include('front.home.isotop-gallary')
    @include('front.home.friends-img-slider')
    @include('front.home.student-comment')
@endsection
@section('extra-js')

@endsection
