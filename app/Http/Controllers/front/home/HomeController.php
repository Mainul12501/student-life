<?php

namespace App\Http\Controllers\front\home;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\admin\GalleryAudio;
use App\Models\admin\GalleryVideo;
use App\Models\admin\HomeGallerySliderImages;
use App\Models\admin\UserComments;
use App\Models\admin\UserDetails;
use App\Models\admin\UserGalleryImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index ()
    {
        $com   = UserComments::orderBy('id', 'DESC')->get();
        if (count($com) > 4)
        {
            $comments   = $com->random(4);
        } else {
            $comments   = $com;
        }
        $homeImagePopUps    = HomeGallerySliderImages::all();
        foreach ($homeImagePopUps as $titleName)
        {
            $arrayTitleName[] =$titleName->title;
            $arrayDisplayName[] =$titleName->display_name;
        }
        if (isset($arrayTitleName))
        {
            $titleNames = array_unique($arrayTitleName);
        } else {
            $titleNames = [];
        }
        if (isset($arrayDisplayName))
        {
            $displayNames = array_unique($arrayDisplayName);
        } else {
            $displayNames = [];
        }

        return view('front.home.home', [
            'comments'      => $comments,
            'titleNames'    => $titleNames,
            'displayNames'  => $displayNames,
            'homeImagePopUps' => $homeImagePopUps,
        ]);
    }
    public function userGallery($id)
    {
        $gallery    = UserGalleryImage::where('user_id', $id)->take($this->galleryItem)->get();
        $galleryAudio   = GalleryAudio::where('user_id', $id)->get();
        $galleryVideo   = GalleryVideo::where('user_id', $id)->get();
        $user       = User::findOrFail($id);
        return view('front.gallery.user', [
            'gallery'   => $gallery,
            'user'      => $user,
            'galleryAudios'  => $galleryAudio,
            'galleryVideos'  => $galleryVideo,
        ]);
    }
    public $galleryItem = 20;
    public function getMoreImage($id)
    {
        $this->galleryItem += 20;
        $gallery    = UserGalleryImage::where('user_id', $id)->take($this->galleryItem)->get();
        return json_encode($gallery);
    }

    public function userProfile($id)
    {
        $user   = User::findOrFail($id);
        $userProfileDetails = UserDetails::where('user_id', $id)->first();
        $com   = UserComments::where('comment_to', $id)->get();
        if (count($com) > 6)
        {
            $comments   = $com->random(6);
        } else {
            $comments = $com;
        }
//        return $com;
        return view('front.user-details.profile',[
            'user'      => $user,
            'comments'  => $comments,
            'userProfileDetails'    => $userProfileDetails,
        ]);
    }
    public function teacherSpeech($serial)
    {
        if ($serial == 'one')
        {
            return view('front.teacher-speech.teacher-1');
        } elseif ($serial == 'two')
        {
            return view('front.teacher-speech.two');
        } elseif ($serial == 'three')
        {
            return view('front.teacher-speech.three');
        } elseif ($serial == 'four')
        {
            return view('front.teacher-speech.four');
        } elseif ($serial == 'five')
        {
            return view('front.teacher-speech.five');
        } elseif ($serial == 'six')
        {
            return view('front.teacher-speech.six');
        }
    }
    public function allComments()
    {
        return view('front.comments.comment');
    }
    public $gal = 40;
    public function galleryPage()
    {
        $galleryAudio   = GalleryAudio::all();
        $galleryVideo   = GalleryVideo::all();
        $galleryImages  = UserGalleryImage::take($this->gal)->get();
        return view('front.gallery.page', [
            'gallery' => $galleryImages,
            'galleryAudios'  => $galleryAudio,
            'galleryVideos'  => $galleryVideo,
        ]);
    }
    public function getMoreGalleryImage()
    {
        $this->gal += 40;
        $gallery    = UserGalleryImage::take($this->galleryItem)->get();
        return json_encode($gallery);
    }
}
