<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('codReferencia', 20)->nullable(false)->charset('utf8')->collation('utf8_unicode_ci');
            $table->text('descricao')->nullable(false)->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('marca', 255)->nullable(false)->charset('utf8')->collation('utf8_unicode_ci');
            $table->decimal('valor', 10, 2)->nullable(false);
            $table->smallInteger('quantidade')->nullable(false);
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
        Schema::dropIfExists('produtos');
    }
}
