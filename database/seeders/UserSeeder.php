<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::where('slug','web-developer')->first();
        $admin = Role::where('slug', 'Admin')->first();
        $adminPremission= Permission::where('slug','Admin')->first();
        $createTasks = Permission::where('slug','create-tasks')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();
        $user1 = new User();
        $user1->name = 'Jhon Deo';
        $user1->email = 'jhossgn@dfeo.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($developer);
        $user1->permissions()->attach($createTasks);
        $user2 = new User();
        $user2->name = 'Анна Мардамшина';
        $user2->email = 'root@admin.com';
        $user2->password = bcrypt('33c200fc51467f09088a80f08df583f2');
        $user2->save();
        $user2->roles()->attach($admin);
        $user2->permissions()->attach($adminPremission);
    }
}