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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("name");
            $table->float("volume")->default(0);
            $table->float("max_volume");

            $table
                ->foreignIdFor(Device::class)
                ->constrained("devices")
                ->onDelete("cascade");
            $table
                ->foreignIdFor(User::class, "owner_id")
                ->nullable()
                ->constrained("users")
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
