<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeqvimTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teqvim_translations', function (Blueprint $table) {
            $table->id();
            $table->string("locale");
            $table->unsignedBigInteger("teqvim_id");
            $table->string("name")->nullable();
            $table->string("title")->nullable();
            $table->text("content")->nullable();
            $table->unique(["teqvim_id","locale"]);
            $table->foreign("teqvim_id")->references("id")->on("teqvims")->onDelete("cascade");
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
        Schema::dropIfExists('teqvim_translations');
    }
}
