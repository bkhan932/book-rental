<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Bilal Khan',
            'email' => 'test@gmail.com',
            'password' => '123456',
            'image' => 'default.jpg',
        ]);

        User::factory(4)->create();
    }
}
