<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained();
            $table->string('name');
            $table->text('description');
            $table->integer('bitrate');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracks');
    }
};
