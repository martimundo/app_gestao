<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' =>$faker->companyEmail,
        'telefone' =>$faker->tollFreePhoneNumber,
        'motivo_contato' => $faker->numberBetween(1, 3),
        'mensagem' => $faker->text(200) 
    ];
});

/**
 * Factory são classes que podemos usar para gerar dados aleatório em nosso sistema. No link: https://github.com/fzaninotto/Faker
 * podemos encontrar todos os atributos e metodos que podemos utilizar para gerar esses dados aleatórios.
 * 
 * Após defirmos os dados da nossa Factory, vamos incorpar esse metódo dentro da nossa Seeder site contatos.
 * Na classe Seeder usaremos factory(SiteContatoFactory::class, 100)->create(); o Segundo arqumento é a quantidade de registro que queremos adicionar a classo
 * 
 * Após tudo definido, rode o comanado php artisan db:seed --class=SiteContatoSeeder
*/
