<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerefdasQurumTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terefdas_qurum_translations', function (Blueprint $table) {
           $table->id();

            $table->string("locale");
            $table->unsignedBigInteger("terefdas_qurum_id");
            $table->string('name')->nullable();
            $table->unique(['terefdas_qurum_id','locale']);
            $table->foreign("terefdas_qurum_id")->references("id")->on("terefdas_qurums")->onDelete("cascade");
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
        Schema::dropIfExists('terefdas_qurum_translations');
    }
}
