<?php

namespace App\Http\Livewire\Front\Comments;

use App\Models\admin\UserComments;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;
    public $loadContant = 15;
    public function render()
    {
        $comments   = UserComments::orderBy('id', 'DESC')->take($this->loadContant)->get();
        return view('livewire.front.comments.comment', [
            'comments'      => $comments,
        ]);
    }
    public function loadMore()
    {
        $this->loadContant += 10;
    }
}
