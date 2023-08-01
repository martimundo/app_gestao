<?php

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
        
        $this->call(FornecedorSeeder::class);
        $this->call(SiteContatoSeeder::class);
        $this->call(MotivoContatoSeeder::class);
    }
    /**
     * Nesse exemplo a primeira instrução ja foi rodada e incluida no banco. Se rodarmos novamente o comando seed, os dados
     * serão reprocessados.
     * Nesse caso, para incluir apenas os novos dados, devemos na linha de comando passar o seguinte comando:
     * php artisan db:seed --class=NomeDaClasseSeeder
     */
}
