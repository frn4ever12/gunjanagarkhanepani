<?php

namespace Database\Seeders;

use App\Models\ImportantLink;
use Illuminate\Database\Seeder;

class ImportantLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            [
                'title' => 'सरकारी पोर्टल',
                'url' => 'https://www.nepal.gov.np',
                'icon' => 'fa-landmark',
                'opens_in_new_tab' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'खानेपानी मन्त्रालय',
                'url' => 'https://mowss.gov.np',
                'icon' => 'fa-building',
                'opens_in_new_tab' => true,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'गुणस्तर परीक्षण रिपोर्ट',
                'url' => '#quality',
                'icon' => 'fa-vial',
                'opens_in_new_tab' => false,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'वार्षिक प्रतिवेदन',
                'url' => '#reports',
                'icon' => 'fa-file-alt',
                'opens_in_new_tab' => false,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'नियमावली',
                'url' => '#regulations',
                'icon' => 'fa-book',
                'opens_in_new_tab' => false,
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'FAQ',
                'url' => '#faq',
                'icon' => 'fa-question-circle',
                'opens_in_new_tab' => false,
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($links as $link) {
            ImportantLink::create($link);
        }
    }
}
