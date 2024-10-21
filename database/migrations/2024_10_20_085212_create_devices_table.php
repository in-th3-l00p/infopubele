<?php

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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("name")->unique();
            $table->string("series")->unique();
            $table->string("city");
            $table->float("latitude")->nullable();
            $table->float("longitude")->nullable();

            $table
                ->foreignIdFor(User::class, "owner_id")
                ->nullable()
                ->constrained("users")
                ->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
