<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(Tipo_veiculosTableSeeder::class);
        $this->call(VeiculoTableSeeder::class);
        $this->call(Preco_veiculoTableSeeder::class);
        $this->call(ServicosTableSeeder::class);
        $this->call(ManutencaoTableSeeder::class);
        $this->call(TimelinesTableSeeder::class);

    }
}
