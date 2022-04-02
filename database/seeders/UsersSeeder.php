<?php

namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$role = Role::where('slug',  'admin')->first();
        //$status = UserStatus::where('slug',  'active')->first();

        $role_id = DB::table('roles')
            ->where('slug', '=', 'admin')->value('id');
        $status_id = DB::table('user_statuses')
            ->where('slug', '=', 'active')->value('id');
        DB::table('users')->insert(
            [
                'id' => Str::uuid(),
                'name' => 'Em',
                'middlename' =>'Et',
                'surname' => 'All',
                'role_id' => $role_id,
                'status_id' => $status_id,
                'phone' => '89278067545',
                'email' => 'admin@example.com',
                //'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('admin'),

                'birth_date' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        $role_id = DB::table('roles')
            ->where('slug', '=', 'user')->value('id');
        $status_id = DB::table('user_statuses')
            ->where('slug', '=', 'active')->value('id');
        DB::table('users')->insert(
            [
                'id' => Str::uuid(),
                'name' => 'new',
                'middlename'=>'nww',
                'surname' => 'new',
                'role_id' => $role_id,
                'status_id' => $status_id,
                'phone' => '89278467745',
                'email' => 'new@new.com',
                // 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('new'),
                'birth_date' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        $role_id = DB::table('roles')
            ->where('slug', '=', 'moderator')->value('id');
        $status_id = DB::table('user_statuses')
            ->where('slug', '=', 'active')->value('id');
        DB::table('users')->insert(
            [
                'id' => Str::uuid(),
                'name' => 'new2',
                'middlename'=>'nww2',
                'surname' => 'new2',
                'role_id' => $role_id,
                'status_id' => $status_id,
                'phone' => '89578056754',
                'email' => 'new2@new.com',
                // 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('new2'),
                'birth_date' => Carbon::now()->format('Y-m-d H:i:s'),

            ]
        );
    }
}
