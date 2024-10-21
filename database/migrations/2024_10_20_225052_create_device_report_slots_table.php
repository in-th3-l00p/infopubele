<?php

use App\Models\Device;
use App\Models\DeviceReport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('device_report_slots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("name");
            $table->double("volume");
            $table->double("max_volume");

            $table
                ->foreignIdFor(DeviceReport::class)
                ->constrained("device_reports")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_report_slots');
    }
};
