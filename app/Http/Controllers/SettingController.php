<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\PngEncoder;

class SettingController extends Controller
{
    //

    //settings

    public function settings()
    {
        // dd(Setting::where('key', 'contact_email'));
        // $settings = [
        //     'contact_email' => Setting::where('key', 'contact_email')->value('value') ?? '',
        //     'contact_phone' => Setting::where('key', 'contact_phone')->value('value') ?? '',
        //     'contact_address' => Setting::where('key', 'contact_address')->value('value') ?? '',
        //     'slogan' => Setting::where('key', 'slogan')->value('value') ?? '',
        //     'policy' => Setting::where('key', 'policy')->value('value') ?? '',
        //     'logo' => Setting::where('key', 'logo')->value('value') ?? '',
   
        // ];
        $settings = Setting::pluck('value', 'key')->toArray();
        // return view('admin.settings.index', compact('settings'));
        return view('admin.settings', compact('settings'));
    }

    public function save(Request $request)
    {
        // dd($request);
        $request->validate([
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'contact_address' => 'required',
            'slogan' => 'required',
            'policy' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'site_banner_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);
        // $settings = [
        //     'contact_email' => request('contact_email'),
        //     'contact_phone' => request('contact_phone'),
        //     'contact_address' => request('contact_address'),
        //     'slogan' => request('slogan'),
        //     'policy' => request('policy'),
        // ];

        // Update or create general settings
        $this->updateOrCreateSetting('contact_email', $request->contact_email);
        $this->updateOrCreateSetting('contact_phone', $request->contact_phone);
        $this->updateOrCreateSetting('contact_address', $request->contact_address);
        $this->updateOrCreateSetting('slogan', $request->slogan);
        $this->updateOrCreateSetting('policy', $request->policy);

        // foreach ($settings as $key => $value) {
        //     Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        // }

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $imageName = time() . '.' . $file->getClientOriginalExtension(); // Generate unique name

            // $resizedImage = Image::make($file)->resize(300, 300)->encode();

            $file->move(public_path('assets/logos'), $imageName);

            $this->updateOrCreateSetting('logo', $imageName);

            // Setting::updateOrCreate(['key' => 'logo'], ['value' => $imageName]);
        }

        // Handle site banner images upload
        if ($request->hasFile('site_banner_images')) {
            $manager = new ImageManager(new Driver());
            $bannerPaths = [];
            foreach ($request->file('site_banner_images') as $uploadedImage) {
                // $fileName = time() . '_' . $image->getClientOriginalName(); // Generate a unique file name

                // $image->move(public_path('assets/banner-images'), $fileName); // Save the image to public/assets

                // $bannerPaths[] =  $fileName; // Store the relative path

                $originalFileName = time() . '_' . $uploadedImage->getClientOriginalName();
                $fileExtension = $uploadedImage->getClientOriginalExtension();
                $pngFileName = str_replace('.' . $fileExtension, '.png', $originalFileName);

                $destinationPath = public_path('assets/banner-images/' . $pngFileName);

                $image = $manager->read($uploadedImage->getRealPath());
                $image->scale(866, 415); 
                $encoder = new PngEncoder(9); 
                $image->encode($encoder)->save($destinationPath); 

                $bannerPaths[] = $pngFileName;
            }
            $this->updateOrCreateSetting('site_banner_images', json_encode($bannerPaths));
        }


        return back()->with('success', '設定が正常に更新されました。');
    }

    // Helper function to update or create a setting
    private function updateOrCreateSetting($key, $value)
    {
        Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    
    // public function index()
    // {
    //     $settings = Setting::all();
    //     return view('admin.settings.index', compact('settings'));
    // }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'contact_email' => 'required|email',
    //         'contact_phone' => 'required',
    //         'contact_address' => 'required',
    //         'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $settings = [
    //         'contact_email' => $request->contact_email,
    //         'contact_phone' => $request->contact_phone,
    //         'contact_address' => $request->contact_address,
    //     ];

    //     foreach ($settings as $key => $value) {
    //         Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    //     }

    //     // Handle Logo Upload
    //     if ($request->hasFile('logo')) {
    //         $logoPath = $request->file('logo')->store('logos', 'public');
    //         Setting::updateOrCreate(['key' => 'logo'], ['value' => $logoPath]);
    //     }

    //     return redirect()->back()->with('success', 'Settings updated successfully.');
    // }

}
