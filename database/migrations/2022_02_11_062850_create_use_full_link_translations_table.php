<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseFullLinkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_full_link_translations', function (Blueprint $table) {
           $table->id();

            $table->string("locale");
            $table->unsignedBigInteger("use_full_link_id");
            $table->string('name')->nullable();
            $table->unique(['use_full_link_id','locale']);
            $table->foreign("use_full_link_id")->references("id")->on("use_full_links")->onDelete("cascade");
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
        Schema::dropIfExists('use_full_link_translations');
    }
}
