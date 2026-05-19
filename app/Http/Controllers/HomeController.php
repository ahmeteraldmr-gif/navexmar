<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Section;
use App\Models\Service;
use App\Models\Setting;
use App\Models\HeaderImage;

class HomeController extends Controller
{
    public function index()
    {
        $lang = app()->getLocale();
        $page = Page::where('page_key', 'home')->first();
        $sections = Section::where('page_key', 'home')->get();
        $services = Service::orderBy('display_order')->get();
        $settings = Setting::all()->pluck('setting_value', 'setting_key')->toArray();
        
        $headerImage = HeaderImage::where('page_key', 'home')
            ->where('is_active', true)
            ->first();

        return view('pages.home', compact('page', 'sections', 'services', 'settings', 'headerImage'));
    }

    public function approach()
    {
        $lang = app()->getLocale();
        $page = Page::where('page_key', 'approach')->first();
        $sections = Section::where('page_key', 'approach')->get();
        $settings = Setting::all()->pluck('setting_value', 'setting_key')->toArray();
        $services = Service::orderBy('display_order')->get();

        return view('pages.approach', compact('page', 'sections', 'settings', 'services'));
    }

    public function policies()
    {
        $lang = app()->getLocale();
        $page = Page::where('page_key', 'policies')->first();
        $sections = Section::where('page_key', 'policies')->get();
        $settings = Setting::all()->pluck('setting_value', 'setting_key')->toArray();
        $services = Service::orderBy('display_order')->get();

        return view('pages.policies', compact('page', 'sections', 'settings', 'services'));
    }
}
