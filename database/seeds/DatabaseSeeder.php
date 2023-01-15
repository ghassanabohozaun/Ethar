<?php

use App\Models\AboutType;
use App\Models\Role;
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

        Role::create([
            'role_name_ar' => 'supervisor',
            'role_name_en' => 'مشرف عام',
            'permissions' => json_encode(["dashboard", "settings", "admins", "roles", "users",]),
        ]);

        $this->call([
            SettingsSeeder::class,
            AdminSeeder::class,
        ]);

        // About_type
        $abouts_en = ['Rationale', 'What We Do',  'Mission', 'Construction', 'Work Ethics', 'Constitution'];
        $abouts_ar = ['عرض الاسباب', 'ماذا نفعل ', 'التعليمات', 'المهام',  'اخلاق العمل', 'دستور'];

        for ($i = 0; $i < count($abouts_en); $i++) {
            AboutType::create([
                'name_en' => $abouts_en[$i],
                'name_ar' => $abouts_ar[$i],
            ]);
        }

    }
}
