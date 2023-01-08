<?php


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
            'role_name_ar' => 'admin',
            'role_name_en'=> 'admin',
            'permissions'=> json_encode(["dashboard", "settings", "admins", "roles", "users", "support-center", "articles"]),
        ]);

        $this->call([
            SettingsSeeder::class,
            AdminSeeder::class,
        ]);

    }
}
