<?php

namespace Database\Seeders;

use App\Models\Official;
use Illuminate\Database\Seeder;

class OfficialSeeder extends Seeder
{
    public function run(): void
    {
        $officials = [
            [
                'name' => 'Er. Ram Ratan Shah',
                'position' => 'Managing Director',
                'designation' => 'Managing Director',
                'photo' => null,
                'bio' => 'Er. Ram Ratan Shah leads the Gunjannagar Water Supply Project as Managing Director.',
                'phone' => '9700000701, 014117354',
                'email' => 'md@kukl.org.np',
                'show_on_homepage' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Mr. Prakash Kumar Rai',
                'position' => 'Manager',
                'designation' => 'Manager, Spokes Person',
                'photo' => null,
                'bio' => 'Mr. Prakash Kumar Rai serves as Manager and Spokesperson.',
                'phone' => '9700000702',
                'email' => 'spokes.person@kukl.org.np',
                'show_on_homepage' => true,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Mr. Bir Bahadur Chand',
                'position' => 'Assistant Manager',
                'designation' => 'Information Officer / Nodal Officer / Assistant Spokesperson',
                'photo' => null,
                'bio' => 'Mr. Bir Bahadur Chand serves as Information Officer and Nodal Officer.',
                'phone' => '9700000719',
                'email' => 'information.officer@kukl.org.np',
                'show_on_homepage' => true,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($officials as $official) {
            Official::create($official);
        }
    }
}
