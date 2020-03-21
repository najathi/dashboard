<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $users = [
            [
                'role_id' => 1,
                'is_active' => 1,
                'name' => 'najathi',
                'email' => 'najathi.cf@slbi.lk',
                'password' => bcrypt('abcd1234'),
                'photo_id' => null
            ],
            [
                'role_id' => 1,
                'is_active' => 1,
                'name' => 'rikaz',
                'email' => 'rikaz.cf@slbi.lk',
                'password' => bcrypt('abcd1234'),
                'photo_id' => null
            ],
        ];

        DB::table('users')->insert($users);
    }
}
