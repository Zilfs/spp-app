<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'admin',
                'password' => 'admin',
                'name' => 'Admin',
                'level' => 'admin',
            ],
            [
                'username' => 'tono',
                'password' => '1234',
                'name' => 'Tono',
                'level' => 'siswa',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
