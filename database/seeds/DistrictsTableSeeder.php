<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $districts = array(
            array('id' => '1','name' => 'Ampara','short_code' => 'AMP','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Anuradhapura','short_code' => 'APR','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'Badulla','short_code' => 'BDL','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => 'Batticaloa','short_code' => 'BAT','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => 'Colombo','short_code' => 'CMB','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => 'Galle','short_code' => 'GLE','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','name' => 'Gampaha','short_code' => 'GMP','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','name' => 'Hambantota','short_code' => 'HBT','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','name' => 'Jaffna','short_code' => 'JFN','created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','name' => 'Kalutara','short_code' => 'KLT','created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','name' => 'Kandy','short_code' => 'KDY','created_at' => NULL,'updated_at' => NULL),
            array('id' => '12','name' => 'Kegalle','short_code' => 'KGL','created_at' => NULL,'updated_at' => NULL),
            array('id' => '13','name' => 'Kilinochchi','short_code' => 'KLN','created_at' => NULL,'updated_at' => NULL),
            array('id' => '14','name' => 'Kurunegala','short_code' => 'KRN','created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','name' => 'Mannar','short_code' => 'MNR','created_at' => NULL,'updated_at' => NULL),
            array('id' => '16','name' => 'Matale','short_code' => 'MTL','created_at' => NULL,'updated_at' => NULL),
            array('id' => '17','name' => 'Matara','short_code' => 'MTR','created_at' => NULL,'updated_at' => NULL),
            array('id' => '18','name' => 'Moneragala','short_code' => 'MNG','created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','name' => 'Mullaitivu','short_code' => 'MLT','created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','name' => 'Nuwara Eliya','short_code' => 'NWR','created_at' => NULL,'updated_at' => NULL),
            array('id' => '21','name' => 'Polonnaruwa','short_code' => 'PLN','created_at' => NULL,'updated_at' => NULL),
            array('id' => '22','name' => 'Puttalam','short_code' => 'PTM','created_at' => NULL,'updated_at' => NULL),
            array('id' => '23','name' => 'Ratnapura','short_code' => 'RTP','created_at' => NULL,'updated_at' => NULL),
            array('id' => '24','name' => 'Trincomalee','short_code' => 'TRM','created_at' => NULL,'updated_at' => NULL),
            array('id' => '25','name' => 'Vavuniya','short_code' => 'VVN','created_at' => NULL,'updated_at' => NULL)
        );

        DB::table('districts')->insert($districts);
    }
}

