<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        // Create permissions
        $editArticlesPermission = Permission::create(['name' => 'edit articles']);
        $publishArticlesPermission = Permission::create(['name' => 'publish articles']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($editArticlesPermission);
        $adminRole->givePermissionTo($publishArticlesPermission);
        $editorRole->givePermissionTo($editArticlesPermission);

        // Assign role to a user
        $user = User::find(1); // Replace with the actual user ID
        $user->assignRole('admin');
    }
}
