<?php

use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $dev_role = Roles::where('slug','developer')->first();
        $user_role = Roles::where('slug', 'user')->first();
        $admin_role = Roles::where('slug', 'admin')->first();

        $telescope_access = new Permissions();
        $telescope_access->slug = 'telescope_access';
        $telescope_access->name = 'Telescope Access';
        $telescope_access->save();
        $telescope_access->roles()->attach($dev_role);

        $create_meetups = new Permissions();
        $create_meetups->slug = 'create_meetups';
        $create_meetups->name = 'Can create Events';
        $create_meetups->save();
        $create_meetups->roles()->attach($user_role);

        $edit_meetups = new Permissions();
        $edit_meetups->slug = 'edit_meetups';
        $edit_meetups->name = 'Can edit Events';
        $edit_meetups->save();
        $edit_meetups->roles()->attach($user_role);

        $create_meetups = new Permissions();
        $create_meetups->slug = 'create_meetups';
        $create_meetups->name = 'Can create Events';
        $create_meetups->save();
        $create_meetups->roles()->attach($admin_role);

        $edit_meetups = new Permissions();
        $edit_meetups->slug = 'edit_meetups';
        $edit_meetups->name = 'Can edit Events';
        $edit_meetups->save();
        $edit_meetups->roles()->attach($admin_role);

        $delete_meetups = new Permissions();
        $delete_meetups->slug = 'delete_meetups';
        $delete_meetups->name = 'Can delete Events';
        $delete_meetups->save();
        $delete_meetups->roles()->attach($admin_role);
    }
}
