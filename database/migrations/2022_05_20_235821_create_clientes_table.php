<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nome', 255)->nullable(false)->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('endereco', 255)->nullable(false)->charset('utf8')->collation('utf8_unicode_ci');;
            $table->string('cpfCnpj', 25)->nullable(false)->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('telefoneCelular', 15)->nullable()->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('telefoneFixo', 15)->nullable()->charset('utf8')->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('clientes');
    }
}
