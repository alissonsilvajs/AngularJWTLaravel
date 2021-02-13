<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alisson Silva',
            'email' => 'alisson@plenary.com.br',
            'password' => bcrypt('@plenarylabs')
        ]);
    }
}
