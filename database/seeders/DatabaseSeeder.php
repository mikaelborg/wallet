<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create(['email' => 'test@gmail.com']);
        \App\Models\User::factory(8)->create();
        \App\Models\User::factory(1)->create(['email' => 'super@gmail.com', 'super' => 1]);
        \App\Models\Wallet::factory(2)->create();
    }
}
