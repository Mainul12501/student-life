<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\admin\BrotherNames;
use App\Models\admin\SisterNames;
use App\Models\admin\UserDetails;
use App\Models\admin\UserGalleryImage;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Image;

class ManageUser extends Component
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
                $users  = User::orderBy('id', 'DESC')->paginate(10);
            } else {
                $users  = User::orderBy('id', 'DESC')->paginate($this->entries);
            }

        } else {
            $users  = User::where('name', 'like','%'.$this->search.'%')->orWhere('role', 'like','%'.$this->search.'%')->orWhere('email', 'like','%'.$this->search.'%')->paginate(10);
        }
        $brothers   = BrotherNames::where('user_id', $this->user_id)->get();
        $sisters   = SisterNames::where('user_id', $this->user_id)->get();
        return view('livewire.admin.user.manage-user', [
            'users' => $users,
            'userGalleryImage'  => $this->userGalleryImage,
            'brothers'          => $brothers,
            'sisters'           => $sisters,

        ]);
    }
    public $userDetailsId,$galleryId,$brotherId,$sisterId,$user_id,$uploader_id,$name,$nick_name,$father_name,$mother_name,$have_brother,$have_sister,$auth_email,$email,$phone,$present_address,$permanent_address,$habits,$profile_image,$primary_school,$high_school,$hsc_college_name,$honours_college_name,$masters_college_name,$company_name,$facebook,$whatsapp,$skype,$twitter,$instagram,$linkedin,$phone_2,$email_2;
    public $brother_name,$sister_name;
    public $gallery_image = [];
    public function resetinputs()
    {
        $this->name = '';
        $this->nick_name = '';
        $this->father_name = '';
        $this->mother_name = '';
        $this->have_brother = '';
        $this->have_sister = '';
        $this->auth_email = '';
        $this->email = '';
        $this->phone = '';
        $this->present_address = '';
        $this->permanent_address = '';
        $this->habits = '';
        $this->profile_image = '';
        $this->primary_school = '';
        $this->high_school = '';
        $this->hsc_college_name = '';
        $this->honours_college_name = '';
        $this->masters_college_name = '';
        $this->company_name = '';
        $this->facebook = '';
        $this->whatsapp = '';
        $this->skype = '';
        $this->twitter = '';
        $this->instagram = '';
        $this->linkedin = '';
        $this->phone_2 = '';
        $this->email_2 = '';
    }
    protected $rules    = [
        'name' => 'required|string|min:4',
        'nick_name' => 'required|string',
        'father_name' => 'required|string',
        'mother_name' => 'required|string',
        'have_brother' => 'required',
        'have_sister' => 'required',
        'auth_email' => 'required|string',
        'email' => '',
        'phone' => 'required',
        'present_address' => 'string',
        'permanent_address' => 'string',
        'habits' => 'required|string',
//        'profile_image' => 'required|image',
        'primary_school' => 'required|string',
        'high_school' => 'required|string',
        'hsc_college_name' => 'required|string',
        'honours_college_name' => 'required|string',
        'masters_college_name' => 'required|string',
        'company_name' => '',
        'facebook' => 'required',
        'whatsapp' => '',
        'skype' => '',
        'twitter' => '',
        'instagram' => '',
        'linkedin' => '',
        'phone_2' => '',
        'email_2' => '',
    ];
    public function store()
    {
        $this->validate();
        if (!isset($this->userDetailsId))
        {
            if ($this->profile_image)
            {
                $profileImage    = $this->userProfileImage();
            }
        } elseif (isset($this->userDetailsId))
        {
            $existDetails = UserDetails::where('id', $this->userDetailsId)->select('id', 'profile_image')->first();
            if (isset($this->profile_image))
            {
                if (file_exists($existDetails->profile_image))
                {
                    unlink($existDetails->profile_image);
                }
                $profileImage    = $this->userProfileImage();
            } else {
                $profileImage   =   $existDetails->profile_image;
            }

        }
        $userDetail = $this->userDetails($profileImage);
        if (isset($this->brother_name))
        {
            $this->brother($userDetail);
        }
        if (isset($this->sister_name))
        {
            $this->sister($userDetail);
        }
        $this->resetinputs();
        $this->closeform();
        session()->flash('message', 'User Data saved Successfully.');
    }
    protected function userDetails($profileImage)
    {
        if (Auth::user()->role  == 'admin')
        {
            $uploader   = 0;;
        } else {
            $uploader   = Auth::user()->id;
        }
        $userDetail   = \App\Models\admin\UserDetails::updateOrCreate(['id'  => $this->userDetailsId],[
            'user_id'                   => $this->user_id,
            'uploader_id'               => $uploader,
            'name'                      => $this->name,
            'nick_name'                 => $this->nick_name,
            'father_name'               => $this->father_name,
            'mother_name'               => $this->mother_name,
            'have_brother'              => $this->have_brother,
            'have_sister'               => $this->have_sister,
            'auth_email'                => $this->auth_email,
            'email'                     => $this->email,
            'phone'                     => $this->phone,
            'present_address'           => $this->present_address,
            'permanent_address'         => $this->permanent_address,
            'habits'                    => $this->habits,
            'profile_image'             => $profileImage,
            'primary_school'            => $this->primary_school,
            'high_school'               => $this->high_school,
            'hsc_college_name'          => $this->hsc_college_name,
            'honours_college_name'      => $this->honours_college_name,
            'masters_college_name'      => $this->masters_college_name,
            'company_name'              => $this->company_name,
            'facebook'                  => $this->facebook,
            'whatsapp'                  => $this->whatsapp,
            'skype'                     => $this->skype,
            'twitter'                   => $this->twitter,
            'instagram'                 => $this->instagram,
            'linkedin'                  => $this->linkedin,
            'phone_2'                   => $this->phone_2,
            'email_2'                   => $this->email_2,
        ]);
        return $userDetail;
    }
    protected function userProfileImage ()
    {
        $image  = $this->profile_image;

        if (!File::exists(public_path('/').'admin/user/'.$this->user_id.'/profile-image'))
        {
            File::makeDirectory(public_path('/').'admin/user/'.$this->user_id.'/profile-image', 0755, true, true);
        }
        $name   = 'admin/user/'.$this->user_id.'/profile-image/'.str_replace(' ','-',time().'.'.$image->getClientOriginalExtension());
        $resize = Image::make($image->getRealPath());
        $resize->resize(230, null, function ($const) {
            $const->aspectRatio();
            $const->upsize();
        });
        $resize->save(public_path('/').$name);
        return $name;
    }
    protected function brother ($userDetail)
    {
        $brothers   = explode(',', $this->brother_name);
        $bros    = BrotherNames::where('user_id', $userDetail->user_id)->get();
        foreach ($bros as $b)
        {
            $b->delete();
        }
        foreach ($brothers as $bro)
        {
            $brother    = BrotherNames::updateOrCreate(['id' => $this->brotherId],[
                'user_id'   => $this->user_id,
                'user_details_id'   => $userDetail->id,
                'brother_name'      => $bro,
            ]);
        }
    }
    protected function sister ($userDetail)
    {
        $sisters   = explode(',', $this->sister_name);
        $bros    = SisterNames::where('user_id', $userDetail->user_id)->get();
        foreach ($bros as $b)
        {
            $b->delete();
        }
        foreach ($sisters as $sis)
        {
            $sister    = SisterNames::updateOrCreate(['id' => $this->sisterId],[
                'user_id'   => $this->user_id,
                'user_details_id'   => $userDetail->id,
                'sister_name'      => $sis,
            ]);
        }
    }
    protected function galleryImage ($userDetail)
    {
        foreach ($this->gallery_image as $image)
        {
            $miniImage  = $this->gallaryImageMini($image, $userDetail);
            $bigImage   = $this->galleryImageBig($image, $userDetail);

            $img    = UserGalleryImage::updateOrCreate(['id' => $this->galleryId], [
                'user_id'   => $this->user_id,
                'user_details_id'   => $userDetail->id,
                'mini_image'     => $miniImage,
                'big_image'     => $bigImage,
            ]);

        }
    }
    protected function galleryImageBig ($image, $userDetail)
    {
        if (!File::exists(public_path('/').'admin/user/'.$this->user_id.'/gallery-images/1080'))
        {
            File::makeDirectory(public_path('/').'admin/user/'.$this->user_id.'/gallery-images/1080', 0755, true, true);
        }
//        $name   = 'admin/user/'.str_replace(' ','-',$this->user_id).'/1080/'.str_replace(' ','-',$image->getClientOriginalName());
        $name   = 'admin/user/'.$this->user_id.'/gallery-images/1080/'.str_replace(' ','-',time().'.'.$image->getClientOriginalExtension());
        $resize = Image::make($image->getRealPath());
        $resize->resize(1080, null, function ($const) {
            $const->aspectRatio();
            $const->upsize();
        });
        $resize->save(public_path('/').$name);
        return $name;
    }
    protected function gallaryImageMini ($image, $userDetail)
    {
        if (!File::exists(public_path('/').'admin/user/'.$this->user_id.'/230'))
        {
            File::makeDirectory(public_path('/').'admin/user/'.$this->user_id.'/230', 0755, true, true);
        }
        $name   = 'admin/user/'.$this->user_id.'/230/'.str_replace(' ','-',time().'.'.$image->getClientOriginalExtension());
        $resize = Image::make($image->getRealPath());
        $resize->resize(230, null, function ($const) {
            $const->aspectRatio();
            $const->upsize();
        });
        $resize->save(public_path('/').$name);
        return $name;
    }

    public function edit($id)
    {
        $this->resetinputs();
        if (Auth::user()->role  == 'admin')
        {
            $uploader   = 0;;
        } else {
            $uploader   = Auth::user()->id;
        }
        $this->user_id  = $id;
        $this->uploader_id  = $uploader;
        $userDetails    = UserDetails::where('user_id', $id)->first();
        if (isset($userDetails->auth_email))
        {
            $this->auth_email = $userDetails->auth_email;
        } else {
            $this->auth_email   = User::findOrFail($id)->email;
        }
        if (isset($userDetails))
        {
            $this->editForm($id, $userDetails);
        }
        $this->openform();
    }
    protected function editForm ($id, $userDetails)
    {
        $this->userDetailsId    = $userDetails->id;
        $this->name = $userDetails->name;
        $this->nick_name = $userDetails->nick_name;
        $this->father_name = $userDetails->father_name;
        $this->mother_name = $userDetails->mother_name;
        $this->have_brother = $userDetails->have_brother;
        $this->have_sister = $userDetails->have_sister;
        $this->email = $userDetails->email;
        $this->phone = $userDetails->phone;
        $this->present_address = $userDetails->present_address;
        $this->permanent_address = $userDetails->permanent_address;
        $this->habits = $userDetails->habits;
        $this->profile_image = $userDetails->profile_image;
        $this->primary_school = $userDetails->primary_school;
        $this->high_school = $userDetails->high_school;
        $this->hsc_college_name = $userDetails->hsc_college_name;
        $this->honours_college_name = $userDetails->honours_college_name;
        $this->masters_college_name = $userDetails->masters_college_name;
        $this->company_name = $userDetails->company_name;
        $this->facebook = $userDetails->facebook;
        $this->whatsapp = $userDetails->whatsapp;
        $this->skype = $userDetails->skype;
        $this->twitter = $userDetails->twitter;
        $this->instagram = $userDetails->instagram;
        $this->linkedin = $userDetails->linkedin;
        $this->phone_2 = $userDetails->phone_2;
        $this->email_2 = $userDetails->email_2;
    }
    public function del($id)
    {
        $user   = User::findOrFail($id);
        $userDetails    = UserDetails::where('user_id', $id)->first();
        $userGalleryImages  = UserGalleryImage::where('user_id', $id)->get();
        $brothers   = BrotherNames::where('user_id', $id)->get();
        $sisters   = SisterNames::where('user_id', $id)->get();
        if (isset($sisters))
        {
            foreach ($sisters as $sister)
            {
                $sister->delete();
            }
        }
        if (isset($brother))
        {
            foreach ($brothers as $brother)
            {
                $brother->delete();
            }
        }
        foreach ($userGalleryImages as $image)
        {
            if (file_exists($image->mini_image))
            {
                unlink($image->mini_image);
            }
            if (file_exists($image->big_image))
            {
                unlink($image->big_image);
            }
            $image->delete();
        }
        if (file_exists($user->profile_image))
        {
            unlink($user->profile_image);
        }
        if (isset($userDetails))
        {
            $userDetails->delete();
        }

        $user->delete();
        session()->flash('message', 'user and his details deleted Successfully.');
    }
    public $openGallery  = false;
//    public $closeGallery    = false;
    public $userGalleryImage = '';
    public function showUserGallery($id)
    {
        $userGallery    = UserGalleryImage::where('user_id', $id)->get();
        if (isset($userGallery))
        {
            $this->openForm = false;
            $this->openTable    = false;
            $this->openGallery  = true;
            $this->userGalleryImage  = $userGallery;
        } else {
            session()->flash('message', 'Please upload images in your gallery folder.');
        }
    }
    public function closeUserGallery ()
    {
        $this->openGallery  = false;
        $this->userGalleryImage =   '';
        $this->openTable    = true;
        $this->openForm = false;
    }
    public function changeRole($id)
    {
        $user   = User::findOrFail($id);
        if ($user->role   == 'user')
        {
            $user->role   = 'teacher';
            $user->save();
        } elseif ($user->role   == 'teacher')
        {
            $user->role   = 'user';
            $user->save();
        } else {
            session()->flash('message', 'Something went wrong. Please try again...');
        }
    }
    public function changeEmail ($id)
    {
        $user   = User::findOrFail($id);
        $user->email     =  $user->req_email;
        if (isset($user->req_name))
        {
            $user->name     =  $user->req_name;
        }
        $user->is_requested = 0;
        $user->req_email    = '';
        $user->req_name    = '';
        $user->save();
        session()->flash('message', 'User email changed Successfully...');
    }
    public function delchangeReq ($id)
    {
        $user   = User::findOrFail($id);
        $user->is_requested = 0;
        $user->req_email    = '';
        $user->req_name    = '';
        $user->save();
        session()->flash('message', 'Email changed Requset Deleted Successfully...');
    }
}
