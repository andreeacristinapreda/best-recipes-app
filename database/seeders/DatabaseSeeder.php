<?php

namespace Database\Seeders;

use App\Models\Recipe;
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
         //\App\Models\User::factory(5)->create();
         $user = \App\Models\User::factory()->create(
            [
                'name' => 'Test Tes',
                'email' => 'test@yahoo.com'
            ]
         );
         Recipe::factory(6)->create(
            [
                'user_id' => $user->id,
            ]
         );
    }
}
