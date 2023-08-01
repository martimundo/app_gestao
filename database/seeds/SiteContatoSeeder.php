<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Maria da Silva';
        $contato->email = "maria@teste.com.br";
        $contato->telefone = '1298-6686';
        $contato->motivo_contato = 2;
        $contato->mensagem = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
        when an unknown printer took a galley of type and scrambled it to make a type specimen book. ";
        $contato->save();
        */

        factory(SiteContato::class, 100)->create();
        
    }
}
