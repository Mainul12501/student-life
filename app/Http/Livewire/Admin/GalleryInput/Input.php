<?php

namespace App\Http\Livewire\Admin\GalleryInput;

use App\Models\admin\GalleryAudio;
use App\Models\admin\GalleryVideo;
use App\Models\admin\UserDetails;
use App\Models\admin\UserGalleryImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Image;

class Input extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme  = 'bootstrap';
    public $openForm    = false;

    public $entries;
    public function render()
    {
        if (!isset($this->entries))
        {
            if (Auth::user()->role == 'admin')
            {
                $homeGallerySliderImages  = UserGalleryImage::orderBy('id', 'DESC')->paginate(20);
            } else {
                $homeGallerySliderImages  = UserGalleryImage::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->paginate(20);
            }
        } else {
            if (Auth::user()->role == 'admin')
            {
                $homeGallerySliderImages  = UserGalleryImage::orderBy('id', 'DESC')->paginate($this->entries);
            } else {
                $homeGallerySliderImages  = UserGalleryImage::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->paginate($this->entries);
            }
        }
        return view('livewire.admin.gallery-input.input' , [
            'homeGallerySliderImages'   => $homeGallerySliderImages,
        ]);
    }
    public $event_name;
    public $images  = [];
    public $audios  = [];
    public $videos  = [];
    public function store()
    {
        $this->validate([
            'event_name'     => 'required|string',
        ]);
        if (Auth::user()->role == 'admin')
        {
            $user_id    = 0;
        } else {
            $user_id    = Auth::user()->id;
        }
        $this->audio($user_id);
        $this->video($user_id);
        $this->image($user_id);
        $this->resetinputs();
        $this->openForm = false;
        session()->flash('message', 'Your Data Saved Successfully.');
    }
    protected function video($user_id)
    {
        if ($this->videos != null)
        {
            foreach ($this->videos as $video)
            {
                GalleryVideo::create([
                    'user_id'   => $user_id,
                    'event_name'    => $this->event_name,
                    'video_file'    => $video->store('admin/gallery/video', 'public')
                ]);
            }
        }
    }
    protected function image($user_id)
    {
        if ($this->images != null)
        {
            foreach ($this->images as $image)
            {
                $miniImage  = $this->miniImage($user_id,$image);
                $bigImage  = $this->bigImage($user_id,$image);
                $galleryImage   = UserGalleryImage::create([
                    'user_id'           => $user_id,
                    'event_name'        => $this->event_name,
                    'mini_image'        => $miniImage,
                    'big_image'         => $bigImage
                ]);
            }
        }
    }
    protected function audio($user_id)
    {
        if ($this->audios != null)
        {

            foreach ($this->audios as $audio)
            {
                GalleryAudio::create([
                    'user_id'   => $user_id,
                    'event_name'    => $this->event_name,
                    'audio_file'    => $audio->store('admin/gallery/audio', 'public'),
                ]);
            }
        }
    }
    protected function bigImage($user_id,$image)
    {
        $i = 0;
        if (!File::exists(public_path('/').'admin/user/'.$user_id.'/gallery-images/1080'))
        {
            File::makeDirectory(public_path('/').'admin/user/'.$user_id.'/gallery-images/1080', 0755, true, true);
//            File::makeDirectory('admin/user/'.$this->user_id.'/profile-image',0775, true, true);
        }
        $name   = 'admin/user/'.$user_id.'/gallery-images/1080/'.str_replace(' ','-',$this->event_name.$i++.time().'.'.$image->getClientOriginalExtension());
        $resize = Image::make($image->getRealPath());
        $resize->resize(1080, null, function ($const) {
            $const->aspectRatio();
            $const->upsize();
        });
        $resize->save(public_path('/').$name);
        return $name;
    }
    protected function miniImage($user_id,$image)
    {
        $i = 0;
        if (!File::exists(public_path('/').'admin/user/'.$user_id.'/gallery-images/230'))
        {
            File::makeDirectory(public_path('/').'admin/user/'.$user_id.'/gallery-images/230', 0755, true, true);
        }
        $name   = 'admin/user/'.$user_id.'/gallery-images/230/'.str_replace(' ','-',$this->event_name.$i++.time().'.'.$image->getClientOriginalExtension());
        $resize = Image::make($image->getRealPath());
        $resize->resize(300, null, function ($const) {
            $const->aspectRatio();
            $const->upsize();
        });
        $resize->save(public_path('/').$name);
        return $name;
    }
    public function resetinputs()
    {
        $this->event_name    = '';
        $this->images   = '';
    }
    public function del($id)
    {
        $image    = UserGalleryImage::findOrFail($id);
        if (file_exists($image->mini_image))
        {
            unlink($image->mini_image);
        }
        if (file_exists($image->big_image))
        {
            unlink($image->big_image);
        }
        $image->delete();
        session()->flash('message', 'Your Image Deleted Successfully.');
    }
}
