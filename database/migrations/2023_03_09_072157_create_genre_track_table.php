<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('genre_track', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained();
            $table->foreignId('track_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('genre_track');
    }
};
