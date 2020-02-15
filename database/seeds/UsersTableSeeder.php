<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$HKO7epAEUUzzg2urUsT0W.ygl.a4Tf6sxni5doN31uJraA.NBlIGK',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
