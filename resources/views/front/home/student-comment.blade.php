<!-- comments about students section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="orelega-one text-center text-capitalize f-s-36 text-success">friends & teachers reviews</h4>
            </div>
        </div>
        @foreach($comments as $comment)
        <div class="row py-3">
            <div class="col-sm-3">
                <span class="roboto text-capitalize text-orange f-s-16">reviewed to: {{ $comment->comment_to_name }}</span>
                <br>
                <div class="d-flex justify-content-center">
                    <img src="{{ $comment->comment_to_image != null ? asset($comment->comment_to_image) : asset('/').'front/img/user.png' }}" class="student-review-img img-fluid float-right" alt="commented-to-{{ str_replace(' ','-',$comment->comment_to_name) }}">
                </div>
            </div>
            <div class="col-sm-6">
                <p class="text-justify mt-3 roboto">
                    {{ $comment->comments }}
                </p>
            </div>
            <div class="col-sm-3">
                <span class="roboto text-capitalize text-orange f-s-16">reviewed by: {{ $comment->comment_by_name }}</span>
                <br>
                <div class="d-flex justify-content-center">
                    <img src="{{ $comment->comment_by_image != null ? asset($comment->comment_by_image) : asset('/').'front/img/user.png' }}" class="student-review-img img-fluid float-left" alt="commented-by-{{ str_replace(' ','-',$comment->comment_by_name) }}">
                </div>
            </div>
        </div>
        @endforeach
        @if(count($comments) > 4)
            <div class="row py-3">
                <div class="col-12">
                    <div class="d-grid col-4 mx-auto">
                        <a href="{{ route('all-comments') }}" class="btn btn-outline-success">View All reviews</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
