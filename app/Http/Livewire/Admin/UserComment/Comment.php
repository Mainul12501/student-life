<?php

namespace App\Http\Livewire\Admin\UserComment;

use App\Models\admin\UserComments;
use App\Models\admin\UserDetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Image;

class Comment extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme  = 'bootstrap';
    public $openForm    = false;
    public $openTable    = true;

    public function openform ()
    {
        $this->openForm = true;
        $this->openTable = false;
    }
    public function closeform()
    {
        $this->openForm = false;
        $this->openTable = true;
    }
    public $search, $entries;
    public function render()
    {
        if (Auth::user()->role  == 'admin')
        {
            if (!isset($this->search))
            {
                if (!isset($this->entries))
                {
                    $comments  = UserComments::orderBy('id', 'DESC')->paginate(10);
                } else {
                    $comments  = UserComments::orderBy('id', 'DESC')->paginate($this->entries);
                }

            } else {
//            $comments  = UserComments::where('comment_to_name', 'like','%'.$this->search.'%')->orWhere('comment_by_name', 'like','%'.$this->search.'%')->orWhere('comments', 'like','%'.$this->search.'%')->paginate(10);
                if (!isset($this->entries))
                {
                    $comments  = UserComments::where('comment_to_name', 'like','%'.$this->search.'%')->orWhere('comment_by_name', 'like','%'.$this->search.'%')->orWhere('comments', 'like','%'.$this->search.'%')->paginate(10);
                } else {
                    $comments  = UserComments::where('comment_to_name', 'like','%'.$this->search.'%')->orWhere('comment_by_name', 'like','%'.$this->search.'%')->orWhere('comments', 'like','%'.$this->search.'%')->paginate($this->entries);
                }
            }
        } else
        {
            if (!isset($this->search))
            {
                if (!isset($this->entries))
                {
                    $comments  = UserComments::where('comment_by', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
                } else {
                    $comments  = UserComments::where('comment_by', Auth::user()->id)->orderBy('id', 'DESC')->paginate($this->entries);
                }

            } else {
//            $comments  = UserComments::where('comment_to_name', 'like','%'.$this->search.'%')->orWhere('comment_by_name', 'like','%'.$this->search.'%')->orWhere('comments', 'like','%'.$this->search.'%')->paginate(10);
                if (!isset($this->entries))
                {
                    $comments  = UserComments::where('comment_by', Auth::user()->id)->where('comment_to_name', 'like','%'.$this->search.'%')->orWhere('comment_by_name', 'like','%'.$this->search.'%')->orWhere('comments', 'like','%'.$this->search.'%')->paginate(10);
                } else {
                    $comments  = UserComments::where('comment_by', Auth::user()->id)->where('comment_to_name', 'like','%'.$this->search.'%')->orWhere('comment_by_name', 'like','%'.$this->search.'%')->orWhere('comments', 'like','%'.$this->search.'%')->paginate($this->entries);
                }
            }
        }

//        $comments   = UserComments::all();
        if (Auth::user()->role  != 'admin')
        {
            $users  = User::where('id', '!=', Auth::id())->get();
        } elseif (Auth::user()->role  == 'admin')
        {
            $users  = User::all();
        }

        return view('livewire.admin.user-comment.comment', [
            'coms'  => $comments,
            'users' => $users,
        ]);
    }
    public $user_image,$commentId,$comment_to,$comment_by,$comments,$image,$audio;
    public function resetinputs()
    {
        $this->user_image   = '';
        $this->comment_by   = '';
        $this->comment_to   = '';
        $this->comments   = '';
        $this->commentId    =   '';
        $this->image    =   '';
        $this->audio    =   '';
    }
    public function getUser($val)
    {
        $user   = User::findOrFail($val);
        $this->user_image   = $user->profile_image;
    }
    public function store()
    {
        $this->validate([
            'comment_to' => 'required'
        ]);
        if (Auth::user()->role == 'admin')
        {
            session()->flash('message', 'Comment with User Id buddy....');
        } else {
            $comment_to_data    = User::where('id', $this->comment_to)->select('id','name','profile_image')->first();
            $this->comment_by  = Auth::id();
            $byName = Auth::user()->name;
            $comment_by_image   = Auth::user()->profile_image;
            $toName = $comment_to_data->name;
            $comment_to_image   = $comment_to_data->profile_image;
            $updateComment   = UserComments::where('comment_to', $this->comment_to)->where('comment_by', $this->comment_by)->select('id','comment_image', 'comment_audio')->first();
            if ($this->image != '')
            {
                if (($updateComment) && ($updateComment->comment_image != null))
                {
                    unlink($updateComment->comment_image);
                }
                $commentImage       = $this->commentImage();
            } else {
                if (($updateComment) && ($updateComment->comment_image != ''))
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
        $this->openForm = false;
        session()->flash('message', 'Your comment Saved Successfully.');
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
    public function del($id)
    {
        $comment    = UserComments::findOrFail($id);
        $comment->delete();
        session()->flash('message', 'Your comment Deleted Successfully.');
    }
    public function edit($id)
    {
        $comment    = UserComments::findOrFail($id);
        $this->commentId    = $comment->id;
        $this->comment_to   = $comment->comment_to;
        $this->comment_by   = $comment->comment_by;
        $this->comments     = $comment->comments;
        $this->openForm     = true;
    }
}
