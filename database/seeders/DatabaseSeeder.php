<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(SiteSettingSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(FavIconSeeder::class);
        $this->call(ContextSeeder::class);
        $this->call(FooterLinksSeeder::class);


    }
}
