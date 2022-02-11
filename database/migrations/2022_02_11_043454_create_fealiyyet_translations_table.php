<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFealiyyetTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fealiyyet_translations', function (Blueprint $table) {
              $table->id();

            $table->string("locale");
            $table->unsignedBigInteger("fealiyyet_id");
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->unique(['fealiyyet_id','locale']);
            $table->foreign("fealiyyet_id")->references("id")->on("fealiyyets")->onDelete("cascade");
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
        Schema::dropIfExists('fealiyyet_translations');
    }
}
