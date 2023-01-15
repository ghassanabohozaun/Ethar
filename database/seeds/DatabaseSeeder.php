<?php

use App\Models\AboutType;
use App\Models\Publications;
use App\Models\Role;
use Database\Seeders\ProjectsSeeder;
use Database\Seeders\PublicationsSeeder;

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
            'role_name_ar' => 'admin',
            'role_name_en'=> 'admin',
            'permissions'=> json_encode(["dashboard", "settings",
                                         "admins", "roles", "users",
                                          "support-center", "articles",
                                        "projects" ,"publications",
                                        "testimonials"]),
        ]);

        $this->call([
            SettingsSeeder::class,
            AdminSeeder::class,
            ProjectsSeeder::class,
        ]);
        Publications::factory()->count(20)->create();


        // About_type
 $abouts_en = ['Rationale','What We Do','FAQ \'s','Mission','Construction','Work Ethics','Constitution'];
 $abouts_ar = ['عرض الاسباب','ماذا نفعل ','التعليمات','المهام','الاعمال','اخلاق العمل','دستور'];

      for($i=0 ; $i < count($abouts_en); $i++ ){
        AboutType::create([
            'name_en' =>$abouts_en[$i] ,
            'name_ar' => $abouts_ar[$i],
        ]);
      }



    }
}
