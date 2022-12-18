<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class DashbordParent extends Component
{
    public $role,$home,$category,$subcategory,$userMng,$createUser,$userComment,$homegallaryslider,$userSuggesions,$galleryInput,$userProfile,$reqEmail,$siteLog,$updateLog;
    protected function changePages()
    {
        $this->updateLog   = false;
        $this->siteLog   = false;
        $this->reqEmail   = false;
        $this->userProfile   = false;
        $this->galleryInput   = false;
        $this->userSuggesions   = false;
        $this->homegallaryslider   = false;
        $this->userComment   = false;
        $this->createUser   = false;
        $this->userMng = false;
        $this->subcategory = false;
        $this->category = false;
        $this->home = false;
        $this->role = false;
        session()->flash('home-dashboard', 'yes');
    }
    public function updateLog()
    {
        $this->changePages();
        $this->updateLog     = true;
        session()->flash('breadcrumb', 'Update-log');
        $this->emit('pageUrl', 'update-log');
    }
    public function siteLog()
    {
        $this->changePages();
        $this->siteLog     = true;
        session()->flash('breadcrumb', 'Site-log');
        $this->emit('pageUrl', 'site-log');
    }
    public function requestEmail()
    {
        $this->changePages();
        $this->reqEmail     = true;
        session()->flash('breadcrumb', 'Email-change');
        $this->emit('pageUrl', 'email-change');
    }
    public function userProfile()
    {
        $this->changePages();
        $this->userProfile     = true;
        session()->flash('breadcrumb', 'edit-your-profile');
        $this->emit('pageUrl', 'profile');
    }
    public function galleryInput()
    {
        $this->changePages();
        $this->galleryInput     = true;
        session()->flash('breadcrumb', 'Input Gallery Images');
        $this->emit('pageUrl', 'input-gallery-images');
    }
    public function userSuggestions()
    {
        $this->changePages();
        $this->userSuggesions     = true;
        session()->flash('breadcrumb', 'User Suggestions');
        $this->emit('pageUrl', 'user-suggestions');
    }
    public function homegalleryslider()
    {
        $this->changePages();
        $this->homegallaryslider     = true;
        session()->flash('breadcrumb', 'Home Gallery Slider Images');
        $this->emit('pageUrl', 'home-gallery-slider-images');
    }
    public function userComment()
    {
        $this->changePages();
        $this->userComment     = true;
        session()->flash('breadcrumb', 'Comments');
        $this->emit('pageUrl', 'comments-about-user');
    }
    public function openCreateUser()
    {
        $this->changePages();
        $this->createUser     = true;
        session()->flash('breadcrumb', 'Create-User');
        $this->emit('pageUrl', 'create-user');
    }
    public function openUserMng()
    {
        $this->changePages();
        $this->userMng     = true;
        session()->flash('breadcrumb', 'User-management');
        $this->emit('pageUrl', 'user-management');
    }
    public function openSubCategory()
    {
        $this->changePages();
        $this->subcategory     = true;
        session()->flash('breadcrumb', 'Sub-Category');
        $this->emit('pageUrl', 'manage-sub-category');
    }
    public function openCategory()
    {
        $this->changePages();
        $this->category     = true;
        session()->flash('breadcrumb', 'Category');
        $this->emit('pageUrl', 'manage-category');
    }
    public function openRole()
    {
        $this->changePages();
        $this->role     = true;
        session()->flash('breadcrumb', 'role');
        $this->emit('pageUrl', 'manage-role');
    }
    public function openHome()
    {
        $this->changePages();
        $this->home     = true;
        $this->emit('pageUrl', 'dashboard');
    }
    public function render()
    {
        return view('livewire.admin.dashbord-parent');
    }
}
