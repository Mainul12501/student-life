<?php

namespace App\Http\Controllers\adminSection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageOneController extends Controller
{
    public function role ()
    {
        return view('admin.role.role');
    }
    public function siteLog()
    {
        return view('admin.log.site');
    }
    public function updateLog()
    {
        return view('admin.log.update');
    }
}
