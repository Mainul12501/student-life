<div>
    {{-- Do your work, then step back. --}}
    @foreach($comments as $comment)
    <div class="row py-3">
        <div class="col-sm-3">
            <span class="roboto text-capitalize text-orange f-s-16">reviewed to: {{ $comment->comment_to_name }}</span>
            <img src="{{ $comment->comment_to_image != null ? $comment->comment_to_image : asset('/').'front/img/user.png' }}" class="student-review-img img-fluid" alt="commented-to-{{ str_replace(' ','-',$comment->comment_to_name) }}">
        </div>
        <div class="col-sm-6">
            <p class="text-justify roboto mt-3">
                {{ $comment->comments }}
            </p>
        </div>
        <div class="col-sm-3">
            <span class="roboto text-capitalize text-orange f-s-16">reviewed by: {{ $comment->comment_by_name }}</span>
            <img src="{{ $comment->comment_by_image != null ? $comment->comment_by_image : asset('/').'front/img/user.png' }}" class="student-review-img img-fluid" alt="commented-by-{{ str_replace(' ','-',$comment->comment_by_name) }}">
        </div>
    </div>
    @endforeach
    <div class="row py-3">
        <div class="col-12">
            <div class="d-grid col-4 mx-auto">
                <a href="" class="btn btn-outline-success" wire:click.prevent="loadMore()">Load More reviews</a>
            </div>
        </div>
    </div>
</div>
