s<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_member = new Role();
        $role_member->name = 'member';
        $role_member->description = 'A Member';
        $role_member->save();

        $role_author = new Role();
        $role_author->name = 'author';
        $role_author->description = 'A Author User';
        $role_author->save();

        $role_manager = new Role();
        $role_manager->name = 'admin';
        $role_manager->description = 'A Admin User';
        $role_manager->save();
    }
}
