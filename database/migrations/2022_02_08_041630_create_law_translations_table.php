<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('law_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("law_id");
            $table->string("locale");
            $table->string("name",500)->nullable();
            $table->unique(['law_id','locale']);
            $table->foreign("law_id")->references("id")->on("laws")->onDelete("cascade");
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
        Schema::dropIfExists('law_translations');
    }
}
