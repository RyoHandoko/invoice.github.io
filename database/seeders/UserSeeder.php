<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Symfony\Component\String\b;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'phone' => '081252808450',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'staff',
            'phone' => '081252808430',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('123123')
        ]);
        $user->assignRole('staff');

        $user = User::create([
            'name' => 'user',
            'phone' => '081253408450',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123123')
        ]);
        $user->assignRole('user');
    }
}
