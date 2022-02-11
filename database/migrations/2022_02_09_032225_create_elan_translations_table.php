<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elan_translations', function (Blueprint $table) {
            $table->id();

            $table->string("locale");
            $table->unsignedBigInteger("elan_id");
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->unique(['elan_id','locale']);
            $table->foreign("elan_id")->references("id")->on("elans")->onDelete("cascade");
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
        Schema::dropIfExists('elan_translations');
    }
}
