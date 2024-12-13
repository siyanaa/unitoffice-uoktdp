<?php

namespace Database\Seeders;

use App\Models\Context;
use Illuminate\Database\Seeder;

class ContextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contexts = array(
            ['NOTICE BOARD'],
            // ['Act And Regulation'],
            ['BUDGET & PROGRAMS'],
        );

        foreach ($contexts as $context) {
            Context::create([
                'title'=>$context[0],

            ]);
        }
    }
}
