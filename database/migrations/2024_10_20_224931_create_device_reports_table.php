<?php

use App\Models\Device;
use App\Models\User;
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
        Schema::create('device_reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table
                ->foreignIdFor(Device::class)
                ->nullable()
                ->constrained("devices")
                ->nullOnDelete();
            $table
                ->foreignIdFor(User::class, "owner_id")
                ->nullable()
                ->constrained("users")
                ->nullOnDelete();


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
