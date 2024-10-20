<?php

use App\Models\Device;
use App\Models\Slot;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("uuid");
            $table
                ->foreignIdFor(User::class)
                ->constrained("users");
            $table
                ->foreignIdFor(Slot::class)
                ->constrained("slots");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
