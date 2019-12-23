<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'id'         => '1',
            'name'       => 'José Wilson da Silva Júnior',
            'nickname'   => 'José Wilson Júnior',
            'image'      => '1josé-wilson-da-silva-júnior-20190618-051438.jpeg',
            'email'      => 'josewilsonsilvajr@gmail.com',
            'password'   => bcrypt('abc@123'),
            'created_at' => '2018-01-01 00:00:00',
        ]);

        User::create([
            'id'         => '2',
            'name'       => 'Usuário Mario Teste',
            'nickname'   => 'Mario',
            'image'      => '2mario-teste-20191119-113347.jpeg',
            'email'      => 'mario@teste.com',
            'password'   => bcrypt('abc@123'),
            'created_at' => '2018-01-01 00:00:00',
        ]);

        User::create([
            'id'         => '3',
            'name'       => 'Usuário Luigi Teste',
            'nickname'   => 'Luigi',
            'image'      => '3luigi-email-20191119-113447.jpeg',
            'email'      => 'luigi@teste.com',
            'password'   => bcrypt('abc@123'),
            'created_at' => '2018-01-01 00:00:00',
        ]);
    }
}
