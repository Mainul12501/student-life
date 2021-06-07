<div>

    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control mt-2" wire:model.lazy="name" placeholder=" Your Name">
            <input type="email" class="form-control my-2" wire:model.lazy="email" placeholder=" Your Email">
            <input type="text" class="form-control my-2" wire:model.lazy="phone" placeholder=" Your Phone Number">
            <textarea name="" id="" cols="30" wire:model.lazy="text" class="form-control my-2" rows="3"></textarea>
            <input type="submit" class="btn text-white my-2 btn-success" wire:click.prevent="store()" value="Send">
        </div>
    </form>
</div>
