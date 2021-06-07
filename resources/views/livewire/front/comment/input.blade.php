<div>
    {{-- Stop trying to control. --}}


    <form action="" >
        <div class="d-flex flex-row">
            <div class="d-flex flex-column">
                <img class="img-fluid" style="border-radius: 50%; height: 50px;" src="{{ isset(\Illuminate\Support\Facades\Auth::user()->profile_image) ? asset(\Illuminate\Support\Facades\Auth::user()->profile_image) : asset('/').'front/img/user.png' }}" alt="">
            </div>
            <div class="d-flex flex-column w-100 ms-4" style="margin-top: 11px;">
                <input type="text" class="form-control commentBox" id="commentInput" wire:model.defer="comments" required />
                @error('comments') <span class="error text-danger">{{ $message }}</span> @enderror
                <input type="hidden" wire:model="comment_to" value="{{ $comment_to }}" />
            </div>
        </div>
        <div class="mt-2" >
            <div class="d-flex flex-row ms-3">
                <div class="d-flex flex-column w-100 ms-4" style="margin-top: 11px;">
                    <label for="" class="ms-2 fw-bold">Image for comment</label>
                    <input type="file" class="form-control" accept="image/*" wire:model.defer="image" />
                </div>
                <div class="d-flex flex-column w-100 ms-4" style="margin-top: 11px;">
                    <label for="" class="ms-2 fw-bold">Audio for comment</label>
                    <input type="file" class="form-control" accept="audio/*" wire:model.defer="audio" />
                </div>
            </div>
            <div class="mt-2">
                <input type="submit" class="btn btn-success float-end text-uppercase" id="saveComment" value="Comment" wire:click.prevent="store()" />
                <a href="" class="btn btn-primary float-end mr-5 text-uppercase" id="cancelComment" >Cancel</a>
            </div>
        </div>
    </form>


</div>
