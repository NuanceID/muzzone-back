<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('album_track', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained();
            $table->foreignId('track_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('album_track');
    }
};
