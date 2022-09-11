<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->integer('scheme_id');
            $table->string('name');
            $table->string('object');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('points');
    }
};
