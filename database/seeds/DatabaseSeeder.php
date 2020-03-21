<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('designations')->truncate();
        DB::table('districts')->truncate();
        DB::table('divisions')->truncate();
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(DesignationsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
    }
}
