<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemvendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemvendas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('idVenda')->nullable(false);
            $table->integer('idProduto')->nullable(false);
            $table->smallInteger('quantidadeItens')->nullable(false);
            $table->dateTime('creationDate');
            $table->dateTime('updatedDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemvendas');
    }
}
