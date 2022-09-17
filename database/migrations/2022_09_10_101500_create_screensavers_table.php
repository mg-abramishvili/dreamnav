<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('screensavers', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->nullable();
            $table->integer('point_id')->nullable();
            $table->integer('event_id')->nullable();
            $table->string('name');
            $table->string('type');
            $table->string('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('screensavers');
    }
};
