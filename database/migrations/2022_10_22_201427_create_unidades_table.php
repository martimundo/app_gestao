<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);//cm,mm,kl,<mt class="etc
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //adicionar o relacionamento com a tabela de produtos..
        /**
         * Nesse relacionamento, o mesmo poderia ser feito criando duas nova migrations para cada incluir em ambas as tabelas os
         * campos que fazem referencia a nova tabela Unidade....
         */
        Schema::table('produtos', function(Blueprint $table){

            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');

        });

        //adicionar o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //removendo o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){

            //remover a FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            //removendo a coluna
            $table->dropColumn('unidade_id');

        });

         //removendo o relacionamento com a tabela de produtos..
         Schema::table('produtos', function(Blueprint $table){
            //removendo a FK
            $table->dropForeign('produtos_unidade_id_foreign');

            //removendo a coluna
            $table->dropColumn('unidade_id');

         });

        Schema::dropIfExists('unidades');
    }
}
