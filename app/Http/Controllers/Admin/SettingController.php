<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            // Handle file upload for logo
            if ($key === 'logo' && $request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public', $filename);
                Setting::set('logo', $filename, 'image');
                continue;
            }
            
            $type = 'text';
            if (in_array($key, ['site_logo', 'favicon'])) {
                $type = 'image';
            } elseif (in_array($key, ['facebook_url', 'twitter_url', 'youtube_url', 'instagram_url'])) {
                $type = 'url';
            } elseif (in_array($key, ['contact_email', 'contact_phone', 'emergency_phone'])) {
                $type = 'email';
            }

            Setting::set($key, $value, $type);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
