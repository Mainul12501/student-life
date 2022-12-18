<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\admin\BrotherNames;
use App\Models\admin\SisterNames;
use App\Models\admin\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class Profile extends Component
{
    use WithFileUploads;
//    public $brothers,$sisters;
    public function mount()
    {
        $existDetails = UserDetails::where('user_id', Auth::id())->first();
        if (isset($existDetails))
        {
            $this->name             = $existDetails->name;
            $this->father_name      = $existDetails->father_name;
            $this->mother_name      = $existDetails->mother_name;
            $this->nick_name        = $existDetails->nick_name;
            $this->have_brother        = $existDetails->have_brother;
            $this->have_sister        = $existDetails->have_sister;
            $this->email        = $existDetails->email;
            $this->phone        = $existDetails->phone;
            $this->present_address        = $existDetails->present_address;
            $this->permanent_address        = $existDetails->permanent_address;
            $this->habits        = $existDetails->habits;
//            $this->profile_image        = $existDetails->profile_image;
            $this->primary_school        = $existDetails->primary_school;
            $this->high_school        = $existDetails->high_school;
            $this->hsc_college_name        = $existDetails->hsc_college_name;
            $this->honours_college_name        = $existDetails->honours_college_name;
            $this->masters_college_name        = $existDetails->masters_college_name;
            $this->company_name        = $existDetails->company_name;
            $this->facebook        = $existDetails->facebook;
            $this->whatsapp        = $existDetails->whatsapp;
            $this->skype        = $existDetails->skype;
            $this->twitter        = $existDetails->twitter;
            $this->instagram        = $existDetails->instagram;
            $this->linkedin        = $existDetails->linkedin;
            $this->phone_2        = $existDetails->phone_2;
            $this->email_2        = $existDetails->email_2;
//            $this->brothers   = BrotherNames::where('user_id', Auth::id())->get();
//            $this->sisters   = SisterNames::where('user_id', Auth::id())->get();
        }

    }
    public function render()
    {
        $brothers   = BrotherNames::where('user_id', Auth::id())->get();
        $sisters   = SisterNames::where('user_id', Auth::id())->get();
        $existDetails = UserDetails::where('user_id', Auth::id())->first();
        return view('livewire.admin.user.profile', [
            'existDetails'      => $existDetails,
            'brothers'          => $brothers,
            'sisters'           => $sisters,
        ]);
    }
    public $userDetailsId,$galleryId,$brotherId,$sisterId,$uploader_id,$name,$nick_name,$father_name,$mother_name,$have_brother,$have_sister,$auth_email,$email,$phone,$present_address,$permanent_address,$habits,$profile_image,$primary_school,$high_school,$masters_college_name,$company_name,$facebook,$whatsapp,$skype,$twitter,$instagram,$linkedin,$phone_2,$email_2;
    public $hsc_college_name,$honours_college_name;
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

        $existDetails = UserDetails::where('user_id', Auth::user()->id)->first();
//        if ((!isset($this->profile_image)) && (!isset($existDetails->profile_image)))
//        {
//            $this->validate([
//                'profile_image' => 'required|image',
//            ]);
//        }
        if (isset($existDetails))
        {
            $this->userDetailsId    = $existDetails->id;
        }

        if (isset($this->profile_image))
        {
            if (isset($existDetails->profile_image))
            {
                if (file_exists($existDetails->profile_image))
                {
                    unlink($existDetails->profile_image);
                }
            }
            $profileImage    = $this->userProfileImage();
        } elseif (isset($existDetails->profile_image))
        {
            $profileImage    = $existDetails->profile_image;
        }


//        if (!isset($this->userDetailsId))
//        {
//            if ($this->profile_image)
//            {
//                $profileImage    = $this->userProfileImage();
//            }
//        } elseif (isset($this->userDetailsId))
//        {
//            $userDetails    =   UserDetails::findOrFail($this->userDetailsId);
//            $profileImage   =   $userDetails->profile_image;
//        }

//        $profileImage   = '';

        $userDetail = $this->userDetails($profileImage);
//        if (isset($this->gallery_image))
//        {
//            $this->galleryImage($userDetail);
//        }
//        package spatie/image-optimizer
        $spatie_image_optimizer = OptimizerChainFactory::create();
        $spatie_image_optimizer->optimize($userDetail->profile_image);

//        package spatie / laravel-image-optimizer
//        ImageOptimizer::optimize($userDetail->profile_image);

        if (isset($this->brother_name))
        {

            $this->brother($userDetail);
        }
        if (isset($this->sister_name))
        {
            $this->sister($userDetail);
        }
//        $this->resetinputs();
        session()->flash('message', 'User Data saved Successfully.');
    }
    protected function userDetails($profileImage)
    {
        $userDetail   = \App\Models\admin\UserDetails::updateOrCreate(['id'  => $this->userDetailsId],[
            'user_id'                   => Auth::user()->id,
            'uploader_id'               => Auth::user()->id,
            'name'                      => $this->name,
            'nick_name'                 => $this->nick_name,
            'father_name'               => $this->father_name,
            'mother_name'               => $this->mother_name,
            'have_brother'              => $this->have_brother,
            'have_sister'               => $this->have_sister,
            'auth_email'                => Auth::user()->email,
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

        if (!File::exists(public_path('/').'admin/user/'.Auth::id().'/profile-image'))
        {
            File::makeDirectory(public_path('/').'admin/user/'.Auth::id().'/profile-image', 0755, true, true);
        }
        $name   = 'admin/user/'.Auth::id().'/profile-image/'.str_replace(' ','-',time().'.'.$image->getClientOriginalExtension());
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
        $bros    = BrotherNames::where('user_id', Auth::id())->get();
        foreach ($bros as $b)
        {
            $b->delete();
        }
        foreach ($brothers as $bro)
        {
            $brother    = BrotherNames::create([
                'user_id'   => Auth::id(),
                'user_details_id'   => $userDetail->id,
                'brother_name'      => $bro,
            ]);
        }
    }
    protected function sister ($userDetail)
    {
        $sisters   = explode(',', $this->sister_name);
        $bros    = SisterNames::where('user_id', Auth::id())->get();
        foreach ($bros as $b)
        {
            $b->delete();
        }
        foreach ($sisters as $sis)
        {
            $sister    = SisterNames::updateOrCreate(['id' => $this->sisterId],[
                'user_id'   => Auth::id(),
                'user_details_id'   => $userDetail->id,
                'sister_name'      => $sis,
            ]);
        }
    }
}
