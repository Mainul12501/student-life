<?php

namespace App\Http\Livewire\Admin\Homegallaryslider;

use App\Models\admin\HomeGallerySliderImages;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Image;

class Slider extends Component
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
        if (!isset($this->search))
        {
            if (!isset($this->entries))
            {
                $homeGallerySliderImages  = HomeGallerySliderImages::orderBy('id', 'DESC')->paginate(10);
            } else {
                $homeGallerySliderImages  = HomeGallerySliderImages::orderBy('id', 'DESC')->paginate($this->entries);
            }

        } else {
//            $comments  = UserComments::where('comment_to_name', 'like','%'.$this->search.'%')->orWhere('comment_by_name', 'like','%'.$this->search.'%')->orWhere('comments', 'like','%'.$this->search.'%')->paginate(10);
            if (!isset($this->entries))
            {
                $homeGallerySliderImages  = HomeGallerySliderImages::where('title', 'like','%'.$this->search.'%')->orWhere('display_name', 'like','%'.$this->search.'%')->paginate(10);
            } else {
                $homeGallerySliderImages  = HomeGallerySliderImages::where('title', 'like','%'.$this->search.'%')->orWhere('display_name', 'like','%'.$this->search.'%')->paginate($this->entries);
            }
        }
        return view('livewire.admin.homegallaryslider.slider',[
            'homeGallerySliderImages'   => $homeGallerySliderImages,
        ]);
    }
    public $title,$display_name;
    public $images  = [];
    public function store()
    {
        foreach ($this->images as $image)
        {

            $miniImage  = $this->miniImage($image);
            $bigImage  = $this->bigImage($image);
            HomeGallerySliderImages::create([
                'title' => $this->title,
                'display_name'  => $this->display_name,
                'mini_image'    => $miniImage,
                'big_image'    => $bigImage,
            ]);
        }

        $this->resetinputs();
        $this->openForm = false;
        session()->flash('message', 'Your Data Saved Successfully.');
    }
    protected function bigImage($image)
    {
        if (!File::exists(public_path('/').'admin/front-gallery-images-slider/1080'))
        {
            File::makeDirectory(public_path('/').'admin/front-gallery-images-slider/1080', 0755, true, true);
//            File::makeDirectory('admin/user/'.$this->user_id.'/profile-image',0775, true, true);
        }
        $name   = 'admin/front-gallery-images-slider/1080/'.str_replace(' ','-',$this->title.time().'.'.$image->getClientOriginalExtension());
        $resize = Image::make($image->getRealPath());
        $resize->resize(1080, null, function ($const) {
            $const->aspectRatio();
            $const->upsize();
        });
        $resize->save(public_path('/').$name);
        return $name;
    }
    protected function miniImage($image)
    {
        if (!File::exists(public_path('/').'admin/front-gallery-images-slider/300'))
        {
            File::makeDirectory(public_path('/').'admin/front-gallery-images-slider/300', 0755, true, true);
//            File::makeDirectory('admin/user/'.$this->user_id.'/profile-image',0775, true, true);
        }
        $name   = 'admin/front-gallery-images-slider/300/'.str_replace(' ','-',$this->title.time().'.'.$image->getClientOriginalExtension());
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
        $this->title    = '';
        $this->display_name = '';
        $this->images   = '';
    }
    public function del($id)
    {
        $image    = HomeGallerySliderImages::findOrFail($id);
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
