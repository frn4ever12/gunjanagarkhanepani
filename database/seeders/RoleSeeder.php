<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'description' => 'Full access to all features',
                'permissions' => ['*'],
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrative access',
                'permissions' => [
                    'dashboard.view',
                    'settings.manage',
                    'content.manage',
                    'users.manage',
                ],
            ],
            [
                'name' => 'Content Manager',
                'slug' => 'content-manager',
                'description' => 'Content management access',
                'permissions' => [
                    'notices.manage',
                    'news.manage',
                    'pages.manage',
                    'downloads.manage',
                    'gallery.manage',
                ],
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'description' => 'Content editing access',
                'permissions' => [
                    'notices.edit',
                    'news.edit',
                    'pages.edit',
                ],
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
