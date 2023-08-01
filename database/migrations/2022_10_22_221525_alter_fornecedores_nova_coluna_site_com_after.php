<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovaColunaSiteComAfter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedores', function(Blueprint $table){

            /**
             * o metodo after, fará a adição de novas colunas a direita da coluna que vc escolher...nesse exemplo a nova coluna
             * foi adicionada após a coluna nome.
             */
            $table->string('site', 150)->after('nome')->nullable();
            $table->string('cnpj', 150)->after('site')->nullable();
            $table->string('telefone', 15)->after('cnpj')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('fornecedores', function (Blueprint $table) {

            $table->dropColumn(['site','cnpj','telefone']);
        });
    }
}
