<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia_translations', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("locale");
            $table->unsignedBigInteger("multimedia_id");
            $table->foreign("multimedia_id")->references("id")->on("multimedia")->onDelete("cascade");
            $table->unique(["multimedia_id","locale"]);
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
        Schema::dropIfExists('multimedia_translations');
    }
}
