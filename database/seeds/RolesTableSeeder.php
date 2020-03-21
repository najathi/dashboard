<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $roles = [
            ['name' => 'Administrator'],
            ['name' => 'Subscriber'],
            ['name' => 'Author'],
            ['name' => 'Staff'],
        ];

        DB::table('roles')->insert($roles);
    }
}
