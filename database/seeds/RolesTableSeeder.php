<?php

use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $dev_permission = Permissions::where('slug','telescope-access')->first();
        $user_permission = Permissions::where('slug','create-meetups')->first();
        $user_permission = Permissions::where('slug','edit-meetups')->first();
        $admin_permission = Permissions::where('slug', 'create-meetups')->first();
        $admin_permission = Permissions::where('slug', 'edit-meetups')->first();
        $admin_permission = Permissions::where('slug', 'delete-meetups')->first();

        $dev_role = new Roles();
        $dev_role->slug = 'developer';
        $dev_role->name = 'Full Stack Developer';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $user_role = new Roles();
        $user_role->slug = 'user';
        $user_role->name = 'User';
        $user_role->save();
        $user_role->permissions()->attach($user_permission); 

        $admin_role = new Roles();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Administrator';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);
    }
}
