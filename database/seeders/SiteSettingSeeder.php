<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create([
            'govn_name' => 'Bagamati Province Government',
            'ministry_name' => 'Ministry of Culture, Tourism & Co-operatives',
            'department_name' => 'Tourism Development Project',
            'office_name' => 'Unit Office, Kathmandu',
            'office_address' => 'New Baneswor, Nepal',
            'office_contact' => '9851330905',
            'office_mail' => 'kathtdp2078@gmail.com',
            'main_logo' => 'main_logo.png',
            'side_logo' => 'side_logo.jpg',
            'flag_logo' => 'nepal_flag.gif',
            'face_link' => 'https://www.facebook.com/profile.php?id=100076877271905&show_switched_toast=true',
            'insta_link' => 'https://www.instagram.com/',
            'social_link' => 'https://www.social.com/',
            'face_page' => 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fp%2FTourism-Development-Project-Unit-Office-Kathmandu-100076877271905%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId',
            'google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7065.801728027106!2d85.33700742995461!3d27.689458745747228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199be495aa8f%3A0xaf9ef9e73eb8572b!2sTourism%20Development%20Project%2C%20Unit%20Office%20Kathmandu!5e0!3m2!1sen!2snp!4v1718692155369!5m2!1sen!2snp',
        ]);
    }
}
