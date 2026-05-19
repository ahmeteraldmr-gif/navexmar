<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;
use App\Models\HeaderImage;
use App\Models\Message;

class ContactController extends Controller
{
    public function index()
    {
        $lang = app()->getLocale();
        $page = Page::where('page_key', 'contact')->first();
        $settings = Setting::all()->pluck('setting_value', 'setting_key')->toArray();
        $services = Service::orderBy('display_order')->get();
        $contactInfo = $settings; // For compatibility with legacy view
        
        $headerImage = HeaderImage::where('page_key', 'contact')
            ->where('is_active', true)
            ->first();

        return view('pages.contact', compact('page', 'settings', 'contactInfo', 'services', 'headerImage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'service' => $request->service,
            'message' => $request->message,
        ]);

        $lang = app()->getLocale();
        $successMsg = $lang === 'tr' 
            ? 'Mesajınız başarıyla gönderildi. En kısa sürede sizinle iletişime geçeceğiz.' 
            : 'Your message has been successfully sent. We will get back to you as soon as possible.';

        return redirect()->back()->with('success', $successMsg);
    }
}
