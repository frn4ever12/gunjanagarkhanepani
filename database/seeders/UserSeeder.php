<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::where('slug', 'super-admin')->first();
        
        User::create([
            'name' => 'Super Admin',
            'email' => env('ADMIN_EMAIL', 'admin@gunjannagar.gov.np'),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin@123')),
            'role_id' => $superAdminRole->id,
            'is_active' => true,
        ]);
    }
}
