<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'userrole'=>'admin',
            'password'=>bcrypt('admin'),
          ]);
        // \App\Models\User::factory(10)->create();
    }
}
