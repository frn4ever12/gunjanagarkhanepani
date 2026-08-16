<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'स्वच्छ पानी, स्वस्थ जीवन',
                'subtitle' => 'गुन्जनगरवासीहरूलाई गुणस्तरीय खानेपानी उपलब्ध गराउनु हाम्रो प्रमुख लक्ष्य हो।',
                'image' => 'https://images.unsplash.com/photo-1541544741-fa0b16e32b3d?w=1920&h=1080&fit=crop',
                'button_text' => 'थप जानकारी →',
                'button_url' => '#about',
                'show_overlay' => true,
                'order' => 1,
                'is_active' => true,
                'featured' => true,
            ],
            [
                'title' => 'खानेपानी सेवा विस्तार',
                'subtitle' => 'सबै नागरिकलाई सुरक्षित तथा गुणस्तरीय खानेपानी सेवा उपलब्ध गराउने हाम्रो प्रतिबद्धता।',
                'image' => 'https://images.unsplash.com/photo-1504384308090-c54be3852f33?w=1920&h=1080&fit=crop',
                'button_text' => 'जान्नुहोस् →',
                'button_url' => '#services',
                'show_overlay' => true,
                'order' => 2,
                'is_active' => true,
                'featured' => true,
            ],
            [
                'title' => 'ग्राहक सेवा',
                'subtitle' => 'हाम्रो ग्राहक सेवा केन्द्र सधैं तपाईंको सेवामा उपलब्ध छ।',
                'image' => 'https://images.unsplash.com/photo-1556740758-90de374c12ad?w=1920&h=1080&fit=crop',
                'button_text' => 'सम्पर्क गर्नुहोस् →',
                'button_url' => '#contact',
                'show_overlay' => true,
                'order' => 3,
                'is_active' => true,
                'featured' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
