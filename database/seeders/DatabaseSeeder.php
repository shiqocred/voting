<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Admin::factory(1)->create();
        \App\Models\Setting::factory(1)->create();

        \App\Models\Admin::factory()->create([
            'username' => 'Admin1',
            'password' => Hash::make('12345')
        ]);
        \App\Models\Admin::factory()->create([
            'username' => 'Admin2',
            'password' => Hash::make('12345')
        ]);
    }
}
