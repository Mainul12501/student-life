<?php

namespace App\Http\Livewire\Admin\Usersuggestions;

use App\Models\front\UserSuggestion;
use Livewire\Component;

class Manage extends Component
{
    public $search, $entries;
    public function render()
    {
        if (!isset($this->search))
        {
            if (!isset($this->entries))
            {
                $suggestions  = UserSuggestion::orderBy('id', 'DESC')->paginate(10);
            } else {
                $suggestions  = UserSuggestion::orderBy('id', 'DESC')->paginate($this->entries);
            }

        } else {
//            $comments  = UserComments::where('comment_to_name', 'like','%'.$this->search.'%')->orWhere('comment_by_name', 'like','%'.$this->search.'%')->orWhere('comments', 'like','%'.$this->search.'%')->paginate(10);
            if (!isset($this->entries))
            {
                $suggestions  = UserSuggestion::where('name', 'like','%'.$this->search.'%')->orWhere('email', 'like','%'.$this->search.'%')->orWhere('phone', 'like','%'.$this->search.'%')->paginate(10);
            } else {
                $suggestions  = UserSuggestion::where('email', 'like','%'.$this->search.'%')->orWhere('email', 'like','%'.$this->search.'%')->orWhere('phone', 'like','%'.$this->search.'%')->paginate($this->entries);
            }
        }
        return view('livewire.admin.usersuggestions.manage', [
            'suggestions'   => $suggestions,
        ]);
    }

    public function del($id)
    {
        $suggestion    = UserSuggestion::findOrFail($id);
        $suggestion->delete();
        session()->flash('message', 'Your Image Deleted Successfully.');
    }
}
