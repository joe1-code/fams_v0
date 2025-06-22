<?php

namespace Database\Seeders\version100;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('leaders')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'user_id' => 6,
                    'designation_id' => 3,
                    'is_active' => true,
                    'created_at' => '2025-06-20 11:48:21',
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
                1 =>
                array (
                    'id' => 2,
                    'user_id' => 2,
                    'designation_id' => 4,
                    'is_active' => true,
                    'created_at' => '2025-06-20 11:48:21',
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
                2 =>
                array (
                    'id' => 3,
                    'user_id' => 8,
                    'designation_id' => 5,
                    'is_active' => true,
                    'created_at' => '2025-06-20 11:48:21',
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
               
            ));
            // $this->enableForeignKeys('unit_groups');

    }
}
