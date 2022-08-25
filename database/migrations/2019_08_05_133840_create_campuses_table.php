<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('programme_id')->index();
            $table->boolean('kl')->default(false);
            $table->boolean('penang')->default(false);
            $table->boolean('perak')->default(false);
            $table->boolean('johor')->default(false);
            $table->boolean('pahang')->default(false);
            $table->boolean('sabah')->default(false);
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
        Schema::dropIfExists('campuses');
    }
}
