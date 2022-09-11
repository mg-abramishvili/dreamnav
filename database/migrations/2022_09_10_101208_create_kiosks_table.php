<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kiosks', function (Blueprint $table) {
            $table->id();
            $table->integer('scheme_id');
            $table->string('name');
            $table->integer('x');
            $table->integer('y');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kiosks');
    }
};
