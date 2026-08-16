<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        $statistics = [
            [
                'title' => 'जडित धारा संख्या',
                'value' => '12,458+',
                'subtitle' => 'Total Connections',
                'icon' => 'fa-faucet',
                'order' => 1,
                'is_visible' => true,
            ],
            [
                'title' => 'खानेपानी सेवा क्षेत्र',
                'value' => '23 वडा',
                'subtitle' => 'Service Area',
                'icon' => 'fa-map-marked-alt',
                'order' => 2,
                'is_visible' => true,
            ],
            [
                'title' => 'दैनिक औसत आपूर्ति',
                'value' => '5.2 ML',
                'subtitle' => 'Daily Supply',
                'icon' => 'fa-water',
                'order' => 3,
                'is_visible' => true,
            ],
            [
                'title' => 'सेवा प्राप्त घरधुरी',
                'value' => '98%',
                'subtitle' => 'Coverage',
                'icon' => 'fa-home',
                'order' => 4,
                'is_visible' => true,
            ],
            [
                'title' => 'सेवा समय',
                'value' => '24/7',
                'subtitle' => 'Service Hours',
                'icon' => 'fa-clock',
                'order' => 5,
                'is_visible' => true,
            ],
            [
                'title' => 'गुणस्तर परीक्षण',
                'value' => 'नियमित',
                'subtitle' => 'Quality Testing',
                'icon' => 'fa-vial',
                'order' => 6,
                'is_visible' => true,
            ],
        ];

        foreach ($statistics as $stat) {
            Statistic::create($stat);
        }
    }
}
