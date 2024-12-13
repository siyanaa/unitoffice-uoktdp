<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterLinksSeeder extends Seeder
{
    public function run()
    {
        DB::table('link')->truncate(); // Optional: Clear the table before seeding

        $links = [
            ['link_title' => trim('Office Of The Prime Minister And Council Of Minister'), 'link_url' => 'https://www.opmcm.gov.np/en/'],
            ['link_title' => trim('Internal Affairs and Law Ministry'), 'link_url' => 'https://moial.bagamati.gov.np/'],
            ['link_title' => trim('Office of Chief Minister and Council of Ministers'), 'link_url' => 'https://ocmcm.bagamati.gov.np/'],
            ['link_title' => trim('Ministry of Economic affairs and Planning'), 'link_url' => 'https://moeap.bagamati.gov.np/'],
            ['link_title' => trim('Ministry of Physical Infrastructure Development'), 'link_url' => 'https://mopid.bagamati.gov.np/'],
            ['link_title' => trim('Ministry of Forests and Environment'), 'link_url' => 'https://mofe.bagamati.gov.np/'],
            ['link_title' => trim('Ministry of Labor Employment and Transport'), 'link_url' => 'https://molet.bagamati.gov.np/'],
            ['link_title' => trim('Ministry of Social Development'), 'link_url' => 'https://mosd.bagamati.gov.np/'],
            ['link_title' => trim('Ministry of Health'), 'link_url' => 'https://moh.bagamati.gov.np/'],
            ['link_title' => trim('Province Policy and Planning Commission'), 'link_url' => 'http://pppc.bagamati.gov.np/'],
            ['link_title' => trim('Province Public Service Commission'), 'link_url' => 'https://spsc.bagamati.gov.np/'],
            ['link_title' => trim('State Head Office, Bagamati Province'), 'link_url' => 'https://oph.bagamati.gov.np/']
        ];

        DB::table('link')->insert($links);
    }
}
