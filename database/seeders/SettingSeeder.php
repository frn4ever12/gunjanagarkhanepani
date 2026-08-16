<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Organization Information
            ['group' => 'general', 'key' => 'site_name_np', 'value' => 'गुन्जनगर खानेपानी आयोजना', 'type' => 'text'],
            ['group' => 'general', 'key' => 'site_name_en', 'value' => 'Gunjannagar Khane Pani Aayojana', 'type' => 'text'],
            ['group' => 'general', 'key' => 'tagline_np', 'value' => 'स्वच्छ पानी, स्वस्थ जीवन', 'type' => 'text'],
            ['group' => 'general', 'key' => 'tagline_en', 'value' => 'Clean Water, Healthy Life', 'type' => 'text'],
            
            // Contact Information
            ['group' => 'contact', 'key' => 'contact_email', 'value' => 'info@gunjannagar.gov.np', 'type' => 'email'],
            ['group' => 'contact', 'key' => 'contact_phone', 'value' => '+977-01-1234567', 'type' => 'text'],
            ['group' => 'contact', 'key' => 'emergency_phone', 'value' => '+977-9876543210', 'type' => 'text'],
            ['group' => 'contact', 'key' => 'office_address', 'value' => 'गुन्जनगर, नेपाल', 'type' => 'textarea'],
            ['group' => 'contact', 'key' => 'office_hours_weekdays', 'value' => '10:00 AM - 5:00 PM', 'type' => 'text'],
            ['group' => 'contact', 'key' => 'office_hours_saturday', 'value' => 'Closed', 'type' => 'text'],
            
            // Social Media
            ['group' => 'social', 'key' => 'facebook_url', 'value' => 'https://facebook.com/gunjannagarkhanepani', 'type' => 'url'],
            ['group' => 'social', 'key' => 'twitter_url', 'value' => 'https://twitter.com/gunjannagar', 'type' => 'url'],
            ['group' => 'social', 'key' => 'youtube_url', 'value' => 'https://youtube.com/gunjannagarkhanepani', 'type' => 'url'],
            
            // Google Maps
            ['group' => 'maps', 'key' => 'google_maps_lat', 'value' => '27.7172', 'type' => 'text'],
            ['group' => 'maps', 'key' => 'google_maps_lng', 'value' => '85.3240', 'type' => 'text'],
            
            // SEO
            ['group' => 'seo', 'key' => 'seo_title', 'value' => 'गुन्जनगर खानेपानी आयोजना - स्वच्छ पानी, स्वस्थ जीवन', 'type' => 'text'],
            ['group' => 'seo', 'key' => 'seo_description', 'value' => 'गुन्जनगर खानेपानी आयोजनाले गुन्जनगरवासीहरूलाई गुणस्तरीय खानेपानी उपलब्ध गराउँछ।', 'type' => 'textarea'],
            ['group' => 'seo', 'key' => 'seo_keywords', 'value' => 'खानेपानी, गुन्जनगर, पानी आपूर्ति, स्वच्छ पानी', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
