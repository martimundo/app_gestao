<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            
            $table->string('uf', 2);
            $table->string('email', 150);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //para remover colunas que foram adicionadas ao banco de dados.
        Schema::table('fornecedores', function (Blueprint $table) {
            
            //$table->dropColumn('uf');//para remover uma unica coluna
            $table->dropColumn(['uf', 'email']);//para remover mais de uma coluna enviando um array
            
        });
    }
}
