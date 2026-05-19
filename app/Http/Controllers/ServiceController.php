<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Section;
use App\Models\Service;
use App\Models\Setting;
use App\Models\HeaderImage;

class ServiceController extends Controller
{
    public function index()
    {
        $lang = app()->getLocale();
        $page = Page::where('page_key', 'services')->first();
        $sections = Section::where('page_key', 'services')->get();
        $services = Service::orderBy('display_order')->get();
        $settings = Setting::all()->pluck('setting_value', 'setting_key')->toArray();
        
        $headerImage = HeaderImage::where('page_key', 'services')
            ->where('is_active', true)
            ->first();

        return view('pages.services', compact('page', 'sections', 'services', 'settings', 'headerImage'));
    }

    public function show($slug)
    {
        $lang = app()->getLocale();
        $service = Service::where('slug', $slug)->firstOrFail();
        $settings = Setting::all()->pluck('setting_value', 'setting_key')->toArray();
        $otherServices = Service::where('slug', '!=', $slug)->orderBy('display_order')->get();
        
        // Use services page header or default to none
        $page = Page::where('page_key', 'services')->first();
        $headerImage = HeaderImage::where('page_key', 'services')
            ->where('is_active', true)
            ->first();

        return view('pages.service_detail', compact('service', 'settings', 'otherServices', 'page', 'headerImage'));
    }
}
