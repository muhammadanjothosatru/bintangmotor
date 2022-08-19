<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'adminlamongan',
               'name'=>'akun admin lamongan',
               'email'=>'adminlamongan@example.com',
                'level'=>'adminlamongan',
               'password'=> bcrypt('123456'),
            ],
            [
                'username' => 'adminbabat',
               'name'=>'akun admin babat',
               'email'=>'adminbabat@example.com',
                'level'=>'adminbabat',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
