<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRehberTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rehber_translations', function (Blueprint $table) {
            $table->id();
            $table->string("locale");
            $table->unsignedBigInteger("rehber_id");
            $table->string("position")->nullable();
            $table->string("name")->nullable();
            $table->string("surname")->nullable();
            $table->string("title")->nullable();
            $table->text("content")->nullable();
            $table->unique(['rehber_id','locale']);
            $table->foreign('rehber_id')->references('id')->on('rehbers')->onDelete('cascade');
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
        Schema::dropIfExists('rehber_translations');
    }
}
