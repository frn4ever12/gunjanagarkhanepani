@extends('admin.layouts.app')

@php
use App\Models\Setting;
@endphp

@section('title', 'Settings - Admin')

@section('page-title', 'Website Settings')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-cog me-2"></i>General Settings
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">Organization Information</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <input type="file" class="form-control" name="logo" accept="image/*">
                        @if(Setting::get('logo'))
                        <div class="mt-2">
                            <img src="{{ asset(Setting::get('logo')) }}" alt="Current Logo" style="max-height: 80px;">
                        </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Organization Name (नेपाली)</label>
                        <input type="text" class="form-control" name="site_name_np" value="{{ old('site_name_np', Setting::get('site_name_np', 'गुन्जनगर खानेपानी आयोजना')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Organization Name (English)</label>
                        <input type="text" class="form-control" name="site_name_en" value="{{ old('site_name_en', Setting::get('site_name_en', 'Gunjannagar Khane Pani Aayojana')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Tagline (नेपाली)</label>
                        <input type="text" class="form-control" name="tagline_np" value="{{ old('tagline_np', Setting::get('tagline_np', 'स्वच्छ पानी, स्वस्थ जीवन')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Tagline (English)</label>
                        <input type="text" class="form-control" name="tagline_en" value="{{ old('tagline_en', Setting::get('tagline_en', 'Clean Water, Healthy Life')) }}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h5 class="mb-3">Contact Information</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Contact Email</label>
                        <input type="email" class="form-control" name="contact_email" value="{{ old('contact_email', Setting::get('contact_email')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Contact Phone</label>
                        <input type="text" class="form-control" name="contact_phone" value="{{ old('contact_phone', Setting::get('contact_phone')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Emergency Phone</label>
                        <input type="text" class="form-control" name="emergency_phone" value="{{ old('emergency_phone', Setting::get('emergency_phone')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Office Address</label>
                        <textarea class="form-control" name="office_address" rows="3">{{ old('office_address', Setting::get('office_address')) }}</textarea>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">Social Media Links</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Facebook URL</label>
                        <input type="url" class="form-control" name="facebook_url" value="{{ old('facebook_url', Setting::get('facebook_url')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Twitter/X URL</label>
                        <input type="url" class="form-control" name="twitter_url" value="{{ old('twitter_url', Setting::get('twitter_url')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">YouTube URL</label>
                        <input type="url" class="form-control" name="youtube_url" value="{{ old('youtube_url', Setting::get('youtube_url')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Instagram URL</label>
                        <input type="url" class="form-control" name="instagram_url" value="{{ old('instagram_url', Setting::get('instagram_url')) }}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h5 class="mb-3">Google Maps</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" class="form-control" name="google_maps_lat" value="{{ old('google_maps_lat', Setting::get('google_maps_lat', env('GOOGLE_MAPS_LAT'))) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" class="form-control" name="google_maps_lng" value="{{ old('google_maps_lng', Setting::get('google_maps_lng', env('GOOGLE_MAPS_LNG'))) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Google Maps API Key</label>
                        <input type="text" class="form-control" name="google_maps_api_key" value="{{ old('google_maps_api_key', Setting::get('google_maps_api_key')) }}">
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">Office Hours</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Sunday - Friday</label>
                        <input type="text" class="form-control" name="office_hours_weekdays" value="{{ old('office_hours_weekdays', Setting::get('office_hours_weekdays', '10:00 AM - 5:00 PM')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Saturday</label>
                        <input type="text" class="form-control" name="office_hours_saturday" value="{{ old('office_hours_saturday', Setting::get('office_hours_saturday', 'Closed')) }}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h5 class="mb-3">SEO Settings</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title', Setting::get('seo_title')) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea class="form-control" name="seo_description" rows="3">{{ old('seo_description', Setting::get('seo_description')) }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" name="seo_keywords" value="{{ old('seo_keywords', Setting::get('seo_keywords')) }}">
                    </div>
                </div>
            </div>
            
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
