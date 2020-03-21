<?php

use Illuminate\Database\Seeder;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $designations = array(
            array('id' => '1','name' => 'Director','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Associate Director','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'District Manager','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => 'Associate District Manager','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => 'Area Manager','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => 'Associate Manager','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','name' => 'Seller / Product Introducer','created_at' => NULL,'updated_at' => NULL)
        );

        DB::table('designations')->insert($designations);
    }
}
