<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            OfficialSeeder::class,
            StatisticSeeder::class,
            SliderSeeder::class,
            ServiceSeeder::class,
            NoticeSeeder::class,
            NewsSeeder::class,
            DownloadSeeder::class,
            ImportantLinkSeeder::class,
            FAQSeeder::class,
            HomepageSectionSeeder::class,
        ]);
    }
}
