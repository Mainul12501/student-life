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
            <livewire:front.comments.comment />
        </div>
    </section>

@endsection
