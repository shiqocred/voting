<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('keluarga');
            $table->string('color');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('image');
            $table->integer('points');
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
        Schema::dropIfExists('condidates');
    }
};
