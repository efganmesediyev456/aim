<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovasiyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovasiyas', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->enum("type",['innovasiya-festivali','layiheler'])->default("innovasiya-festivali");
            $table->string('image');
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
        Schema::dropIfExists('innovasiyas');
    }
}
