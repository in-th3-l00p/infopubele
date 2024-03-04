<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('device_reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(\App\Models\Device::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class);

            $table->string("device_name");
            $table->string("device_city");
            $table->double("device_latitude")->nullable();
            $table->double("device_longitude")->nullable();

            $table->string("spreadsheet_link")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_reports');
    }
};
