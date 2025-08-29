<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favorite_images', function (Blueprint $table) {
            $table->id();
            $table->integer("userId");
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer("myImage")->nullable();
            $table->foreign('myImage')->references('id')->on('my_images')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('imageType', ['myImage', 'api']);
            $table->string('apiImageUrl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_images');
    }
};
