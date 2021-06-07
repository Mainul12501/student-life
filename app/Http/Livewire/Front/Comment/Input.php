<?php

namespace App\Http\Livewire\Front\Comment;

use App\Models\admin\UserComments;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class Input extends Component
{
    use WithFileUploads;
    public function render()
    {
        $user   = $this->userx;
        return view('livewire.front.comment.input', [
            'user'  => $user,
        ]);
    }
//    catch data from parent blade file

    public $user_image,$commentId,$comment_by,$comments,$image,$audio,$comment_to;
    public function resetinputs()
    {
//        $this->comment_by   = '';
//        $this->comment_to   = '';
        $this->comments     = '';
//        $this->commentId    = '';
        $this->image        = '';
        $this->audio        = '';
    }
    public $userx;

    public function mount()
    {
        $this->comment_to   = $this->userx;
    }
    public function store()
    {
        $this->validate([
            'comments'  => 'required'
        ]);
        if (Auth::user()->role == 'admin')
        {
            session()->flash('message', 'Comment with User Id buddy....');
        } else {
            $comment_to_data    = User::where('id', $this->comment_to)->select('id','name','profile_image')->first();
            $this->comment_by   = Auth::id();
            $byName             = Auth::user()->name;
            $toName             = $comment_to_data->name;
            $comment_by_image   = Auth::user()->profile_image;
            $comment_to_image   = $comment_to_data->profile_image;
            $updateComment      = UserComments::where('comment_to', $this->comment_to)->where('comment_by', $this->comment_by)->select('id','comment_image', 'comment_audio')->first();
            if ($updateComment)
            {
                $this->commentId    = $updateComment->id;
            }
            if ($this->image != '')
            {
                if ($updateComment->comment_image != null)
                {
                    unlink($updateComment->comment_image);
                }
                $commentImage       = $this->commentImage();
            } else {
                if ($updateComment->comment_image != null)
                {
                    $commentImage   = $updateComment->comment_image;
                } else {
                    $commentImage       = '';
                }

            }
            if ($this->audio != '')
            {
                $commentAudio       = $this->audio->store('admin/commentAudio', 'public');
            } else {
                if ($updateComment->comment_audio != null)
                {
                    $commentAudio   = $updateComment->comment_audio;
                } else {
                    $commentAudio       = '';
                }
            }
            $comment    = UserComments::updateOrCreate(['id' => $this->commentId], [
                'comment_by'    => $this->comment_by,
                'comment_to'    => $this->comment_to,
                'comments'    => $this->comments,
                'comment_to_name'    => $toName,
                'comment_by_name'    => $byName,
                'comment_to_image'    => $comment_to_image,
                'comment_by_image'    => $comment_by_image,
                'comment_image'      => $commentImage,
                'comment_audio'      => $commentAudio,
            ]);
        }
        $this->resetinputs();
        $this->comment_to   = $this->userx;
        $this->emit('livewireMessage', 'Your data Saved Successfully.');
//        session()->flash('message', 'Your data Saved Successfully.');
    }
    protected function commentImage ()
    {
        $image  = $this->image;

        if (!File::exists(public_path('/').'admin/comment-images/'.Auth::id().'/540'))
        {
            File::makeDirectory(public_path('/').'admin/comment-images/'.Auth::id().'/540', 0755, true, true);
        }
        $name   = 'admin/comment-images/'.Auth::id().'/540/'.str_replace(' ','-',time().'.'.$image->getClientOriginalExtension());
        $resize = Image::make($image->getRealPath());
        $resize->resize(540, null, function ($const) {
            $const->aspectRatio();
            $const->upsize();
        });
        $resize->save(public_path('/').$name);
        return $name;
    }
}
