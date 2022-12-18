<?php

namespace App\Http\Livewire\Front\User;

use App\Models\admin\UserComments;
use App\Models\User;
use Livewire\Component;

class Commentshow extends Component
{
    public $userId;
    public function render()
    {
        $com   = UserComments::where('comment_to', $this->userId)->get();
        $user   = User::findOrFail($this->userId);
        if (count($com) > 6)
        {
            $comments   = $com->random(6);
        } else {
            $comments = $com;
        }
        return view('livewire.front.user.commentshow', [
            'comments'      => $comments,
            'user'          => $user,
        ]);
    }
}
