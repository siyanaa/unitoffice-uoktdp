<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert([
            [
                'name' => 'Test name',
                'position' => 'Test position',
                'role' => 'Test role',
                'image'=> 'digbahadur.jpg',
                'email' => 'info@.gov.np',
                'contact_number' => '+97714200539',
            ],



        ]);
    }
}
