<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovasiyaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovasiya_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('innovasiya_id');
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->unique(['innovasiya_id','locale']);
            $table->foreign('innovasiya_id')->references('id')->on('innovasiyas')->onDelete('cascade');
            $table->string('locale')->index();
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
        Schema::dropIfExists('innovasiya_translations');
    }
}
