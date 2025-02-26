<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

    //settings

    public function settings()
    {
        // dd(Setting::where('key', 'contact_email'));
        $settings = [
            'contact_email' => Setting::where('key', 'contact_email')->value('value') ?? '',
            'contact_phone' => Setting::where('key', 'contact_phone')->value('value') ?? '',
            'contact_address' => Setting::where('key', 'contact_address')->value('value') ?? '',
            'slogan' => Setting::where('key', 'slogan')->value('value') ?? '',
            'policy' => Setting::where('key', 'policy')->value('value') ?? '',
            'logo' => Setting::where('key', 'logo')->value('value') ?? '',
        ];
        return view('admin.settings', compact('settings'));
    }

    public function save(Request $request)
    {

        $request->validate([
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'contact_address' => 'required',
            'slogan' => 'required',
            'policy' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $settings = [
            'contact_email' => request('contact_email'),
            'contact_phone' => request('contact_phone'),
            'contact_address' => request('contact_address'),
            'slogan' => request('slogan'),
            'policy' => request('policy'),
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $imageName = time() . '.' . $file->getClientOriginalExtension(); // Generate unique name

            // $resizedImage = Image::make($file)->resize(300, 300)->encode();

            $file->move(public_path('assets/logos'), $imageName);

            Setting::updateOrCreate(['key' => 'logo'], ['value' => $imageName]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }
    
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'contact_address' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $settings = [
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'contact_address' => $request->contact_address,
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            Setting::updateOrCreate(['key' => 'logo'], ['value' => $logoPath]);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

}
