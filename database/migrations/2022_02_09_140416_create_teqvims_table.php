<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeqvimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teqvims', function (Blueprint $table) {
            $table->id();
            $table->enum("page_type",["tedbir",'teqvim']);
            $table->enum("format_type",["hackhaton","konfrans","musabiqe","simpozium"]);
            $table->string("type",500);
            $table->text("day");
            $table->string("from_hour");
            $table->string("to_hour");
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
        Schema::dropIfExists('teqvims');
    }
}
