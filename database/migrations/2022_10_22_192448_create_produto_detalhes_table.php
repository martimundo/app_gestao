<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8,2);
            $table->float('altura', 8,2);
            $table->float('largura', 8,2);

            //criando o relacionamento entre as tabelas, referenciando o id da coluna principal que é a tabela de produtos
            $table->foreign('produto_id')->references('id')->on('produtos');

            //constrant para definir que os id's não sejam repeditos, pois um produto possui uma detalhe...
            $table->unique('produto_id');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
