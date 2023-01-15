<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name_ar'=>'فلسطين للتنمية والتطوير المجتمعي',
            'site_name_en'=>'Palestine for development and community development',
            'site_lang_ar'=>'on',
            'site_lang_en'=>'on',
        ]);
    }
}
