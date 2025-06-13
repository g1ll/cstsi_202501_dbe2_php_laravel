<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=User::where('email', 'admin@test.dev')->first();
        if(!$admin)
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@test.dev',
                'is_admin'=>true,
                'password'=> 'adminadmin'
            ]);
    }
}
