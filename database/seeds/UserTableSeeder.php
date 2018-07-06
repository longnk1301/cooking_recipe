<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_member = Role::where('name', 'member')->first();
        $role_manager  = Role::where('name', 'admin')->first();
        $role_author = Role::where('name', 'author')->first();

        $member = new User();
        $member->name = 'Member';
        $member->email = 'member@example.com';
        $member->password = bcrypt('123456');
        $member->avatar = 'images/avatar/user1.png';
        $member->save();
        $member->roles()->attach($role_member);

        $author = new User();
        $author->name = 'Author';
        $author->email = 'author@example.com';
        $author->password = bcrypt('123456');
        $author->avatar = 'images/avatar/user2.png';
        $author->save();
        $author->roles()->attach($role_author);

        $manager = new User();
        $manager->name = 'Admin';
        $manager->email = 'admin@example.com';
        $manager->password = bcrypt('123456');
        $manager->avatar = 'images/avatar/user3.png';
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}