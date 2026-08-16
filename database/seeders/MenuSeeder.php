<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Create main navigation menu
        $menu = Menu::create([
            'name' => 'Main Navigation',
            'location' => 'main',
            'is_active' => true,
        ]);

        // Create menu items
        $items = [
            [
                'title' => 'गृहपृष्ठ',
                'url' => '/',
                'icon' => 'fa-home',
                'order' => 1,
                'parent_id' => null,
            ],
            [
                'title' => 'हाम्रो बारेमा',
                'url' => '#',
                'icon' => 'fa-info-circle',
                'order' => 2,
                'parent_id' => null,
                'children' => [
                    ['title' => 'हाम्रो बारेमा', 'url' => '/about', 'order' => 1],
                    ['title' => 'सञ्चालक समिति', 'url' => '/board-of-directors', 'order' => 2],
                    ['title' => 'संगठनात्मक संरचना', 'url' => '/organizational-structure', 'order' => 3],
                    ['title' => 'कर्मचारी विवरण', 'url' => '/staff', 'order' => 4],
                    ['title' => 'कार्यालय समय', 'url' => '/office-hours', 'order' => 5],
                    ['title' => 'नागरिक वडापत्र', 'url' => '/citizen-charter', 'order' => 6],
                ]
            ],
            [
                'title' => 'सेवाहरू',
                'url' => '#',
                'icon' => 'fa-cogs',
                'order' => 3,
                'parent_id' => null,
                'children' => [
                    ['title' => 'खानेपानी सेवा', 'url' => '/services', 'order' => 1],
                    ['title' => 'नयाँ धारा जडान', 'url' => '/services/new-connection', 'order' => 2],
                    ['title' => 'धारा स्थानान्तरण', 'url' => '/services/transfer', 'order' => 3],
                    ['title' => 'धारा मर्मत', 'url' => '/services/maintenance', 'order' => 4],
                    ['title' => 'पानीको गुणस्तर', 'url' => '/services/water-quality', 'order' => 5],
                    ['title' => 'सेवा सम्बन्धी जानकारी', 'url' => '/services/information', 'order' => 6],
                ]
            ],
            [
                'title' => 'ई-सेवाहरू',
                'url' => '#',
                'icon' => 'fa-laptop',
                'order' => 4,
                'parent_id' => null,
                'children' => [
                    ['title' => 'अनलाइन फारमहरू', 'url' => '/e-services/forms', 'order' => 1],
                    ['title' => 'डाउनलोड केन्द्र', 'url' => '/downloads', 'order' => 2],
                    ['title' => 'गुनासो / सुझाव', 'url' => '/complaint', 'order' => 3],
                    ['title' => 'सम्पर्क गर्नुहोस्', 'url' => '/contact', 'order' => 4],
                    ['title' => 'महत्वपूर्ण सूचना', 'url' => '/notices', 'order' => 5],
                ]
            ],
            [
                'title' => 'श्रोतहरू',
                'url' => '#',
                'icon' => 'fa-folder',
                'order' => 5,
                'parent_id' => null,
                'children' => [
                    ['title' => 'डाउनलोड', 'url' => '/downloads', 'order' => 1],
                    ['title' => 'फारमहरू', 'url' => '/forms', 'order' => 2],
                    ['title' => 'वार्षिक प्रतिवेदन', 'url' => '/annual-reports', 'order' => 3],
                    ['title' => 'नियमावली', 'url' => '/rules-regulations', 'order' => 4],
                    ['title' => 'नीति तथा निर्देशिका', 'url' => '/policies', 'order' => 5],
                    ['title' => 'प्रकाशनहरू', 'url' => '/publications', 'order' => 6],
                ]
            ],
            [
                'title' => 'सूचना',
                'url' => '#',
                'icon' => 'fa-bell',
                'order' => 6,
                'parent_id' => null,
                'children' => [
                    ['title' => 'सूचना', 'url' => '/notices', 'order' => 1],
                    ['title' => 'समाचार', 'url' => '/news', 'order' => 2],
                    ['title' => 'प्रेस विज्ञप्ति', 'url' => '/press-releases', 'order' => 3],
                    ['title' => 'सार्वजनिक सूचना', 'url' => '/public-notices', 'order' => 4],
                    ['title' => 'सूचना संग्रह', 'url' => '/notice-archive', 'order' => 5],
                ]
            ],
            [
                'title' => 'पदपूर्ति',
                'url' => '#',
                'icon' => 'fa-briefcase',
                'order' => 7,
                'parent_id' => null,
                'children' => [
                    ['title' => 'रोजगारी सूचना', 'url' => '/vacancy', 'order' => 1],
                    ['title' => 'पदपूर्ति सूचना', 'url' => '/vacancy/notices', 'order' => 2],
                    ['title' => 'परीक्षा कार्यक्रम', 'url' => '/vacancy/exam-schedule', 'order' => 3],
                    ['title' => 'नतिजा', 'url' => '/vacancy/results', 'order' => 4],
                ]
            ],
            [
                'title' => 'सम्पर्क',
                'url' => '/contact',
                'icon' => 'fa-phone',
                'order' => 8,
                'parent_id' => null,
            ],
            [
                'title' => 'थप',
                'url' => '#',
                'icon' => 'fa-ellipsis-h',
                'order' => 9,
                'parent_id' => null,
                'children' => [
                    ['title' => 'FAQ', 'url' => '/faq', 'order' => 1],
                    ['title' => 'फोटो ग्यालरी', 'url' => '/gallery', 'order' => 2],
                    ['title' => 'भिडियो ग्यालरी', 'url' => '/videos', 'order' => 3],
                    ['title' => 'महत्वपूर्ण लिंकहरू', 'url' => '/important-links', 'order' => 4],
                    ['title' => 'वेबसाइट नक्सा', 'url' => '/sitemap', 'order' => 5],
                ]
            ],
        ];

        $parentMap = [];

        foreach ($items as $item) {
            $menuItem = MenuItem::create([
                'menu_id' => $menu->id,
                'title' => $item['title'],
                'url' => $item['url'],
                'icon' => $item['icon'] ?? null,
                'order' => $item['order'],
                'parent_id' => $item['parent_id'],
                'is_active' => true,
            ]);

            $parentMap[$item['title']] = $menuItem->id;

            if (isset($item['children'])) {
                foreach ($item['children'] as $child) {
                    MenuItem::create([
                        'menu_id' => $menu->id,
                        'title' => $child['title'],
                        'url' => $child['url'],
                        'icon' => null,
                        'order' => $child['order'],
                        'parent_id' => $menuItem->id,
                        'is_active' => true,
                    ]);
                }
            }
        }
    }
}
