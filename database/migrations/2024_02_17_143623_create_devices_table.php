<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("name")->unique();

            $table->string("city");
            $table->double("latitude")->nullable();
            $table->double("longitude")->nullable();
            $table->foreignId("association_id")->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
