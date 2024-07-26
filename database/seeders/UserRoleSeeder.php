<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $user = User::find(1); // Replace with the actual user ID
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
