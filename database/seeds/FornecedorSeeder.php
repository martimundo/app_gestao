<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /**
         * 1º FORMA
         * Uma das formas como podemos utilizar a inserção de dados com o Seeder.
         * Nesse primeiro caso, foi instaciado o objeto Fornecedor e utilizado o metodo save() para 
         * guardar os dados no banco de dados.
         */
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Forncedor100';
        $fornecedor->cnpj = '59.086.611/0001-47';
        $fornecedor->email = 'fornecedor@fornecedor100.com.br';
        $fornecedor->site = 'www.fornecedor100.com.br';
        $fornecedor->telefone = '11-';
        $fornecedor->uf = 'SP';
        $fornecedor->save();

        /**
         * 2º FOMRA
         * segunda forma de usar o seeder utilizando o metodo create que nesse 
         * caso esta vinculado ao atributo $filable da classe Fornecedor.
         */
        Fornecedor::create([
            'nome'=>'Fornecedor101',
            'cnpj'=>'68.888.607/0001-93',
            'email'=>'fornecedor101@fornecedor101.com.br',
            'site'=>'www.fornecedor101.com.br',
            'telefone'=>'Fornecedor101',
            'uf'=>'RJ',
        ]);

        /**
         * 3º FOMRA
         * Nesta terceira forma, podemos utilizar o metodo DB para inserir os dados com o método insert 
         * caso esta vinculado ao atributo $filable da classe Fornecedor.
         */

        DB::table('fornecedores')->insert([
            'nome'=>'Fornecedor102',
            'cnpj'=>'02.156.808/0001-98',
            'email'=>'fornecedor102@fornecedor102.com.br',
            'site'=>'www.fornecedor102.com.br',
            'telefone'=>'Fornecedor102',
            'uf'=>'RJ',
        ]);

    }
    /**
     * Após definir os metodos da classe, precisamos rodar o caomando via terminal:
     * antes de rodar o comando, precisamos parametrizar o metodo que esta em DatabaseSeeder.php. Nessa classe esiste um
     * metódo de callback para chamar o seeder que criamos.
     * php artisan de:seed
    */
}
