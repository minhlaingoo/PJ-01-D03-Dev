<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DefaultRolePermissionSeeder::class);

        // User::factory()->create();
        if (!User::where('email', 'pancake@admin.com')->exists()) {
            $user = User::factory()->create([
                'name' => 'Admin PanCake',
                'email' => 'pancake@admin.com',
            ]);

        }

        $settingFactory = new \Database\Factories\SettingFactory();
        $settingFactory->createSettingIfNotExist('general', [
            'appName' => 'PanCake',
            'appDescription' => 'A simple and elegant pancake management system.',
        ]);
    }
}
