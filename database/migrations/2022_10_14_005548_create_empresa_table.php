<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('nome_fantasia')->unique();
            $table->string('cnpj')->unique();
            $table->string('endereco_comercial');
            $table->string('email');
            $table->string('telefone');
            $table->string('cidade');
            $table->string('estado');
            $table->dateTime('ano_fundacao')->nullable();
            $table->integer('empregados')->nullable();
            $table->text('descricao')->nullable();
            $table->string('status_empresa')->default(true);
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
        Schema::dropIfExists('empresa');
    }
}
