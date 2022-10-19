<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create(array(
            'name' => 'hola',
            'email' => 'hola@gmail.com',
            'password' => '$2y$10$x4d/RcVxzk.GTIoRVM91..EpBNch8DglGn/5h/rzzX.EMjou//E/m',
        ));
    }
}
