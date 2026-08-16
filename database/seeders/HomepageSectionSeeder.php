<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'hero',
                'title' => 'Hero Section',
                'is_enabled' => true,
                'order' => 1,
                'settings' => [
                    'show_officials' => true,
                    'officials_count' => 4,
                ],
            ],
            [
                'section_key' => 'statistics',
                'title' => 'Statistics Section',
                'is_enabled' => true,
                'order' => 2,
                'settings' => [],
            ],
            [
                'section_key' => 'services',
                'title' => 'Services Section',
                'is_enabled' => true,
                'order' => 3,
                'settings' => [
                    'items_count' => 6,
                ],
            ],
            [
                'section_key' => 'notices_news',
                'title' => 'Notices & News Section',
                'is_enabled' => true,
                'order' => 4,
                'settings' => [
                    'notices_count' => 4,
                    'news_count' => 3,
                ],
            ],
            [
                'section_key' => 'tariffs',
                'title' => 'Tariff/Rates Section',
                'is_enabled' => true,
                'order' => 5,
                'settings' => [
                    'items_count' => 6,
                ],
            ],
            [
                'section_key' => 'downloads',
                'title' => 'Downloads Section',
                'is_enabled' => true,
                'order' => 6,
                'settings' => [
                    'items_count' => 6,
                ],
            ],
            [
                'section_key' => 'gallery',
                'title' => 'Gallery Section',
                'is_enabled' => true,
                'order' => 7,
                'settings' => [
                    'items_count' => 6,
                ],
            ],
            [
                'section_key' => 'important_links',
                'title' => 'Important Links Section',
                'is_enabled' => true,
                'order' => 8,
                'settings' => [
                    'items_count' => 6,
                ],
            ],
            [
                'section_key' => 'faq',
                'title' => 'FAQ Section',
                'is_enabled' => true,
                'order' => 9,
                'settings' => [
                    'items_count' => 6,
                ],
            ],
            [
                'section_key' => 'contact',
                'title' => 'Contact Section',
                'is_enabled' => true,
                'order' => 10,
                'settings' => [
                    'show_map' => true,
                ],
            ],
        ];

        foreach ($sections as $section) {
            HomepageSection::create($section);
        }
    }
}
