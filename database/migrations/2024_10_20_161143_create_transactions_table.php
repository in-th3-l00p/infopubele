<?php

use App\Models\Card;
use App\Models\Slot;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table
                ->foreignIdFor(Slot::class)
                ->constrained("slots")
                ->onDelete("cascade");
            $table
                ->foreignIdFor(Card::class)
                ->constrained("cards")
                ->onDelete("cascade");
            $table->double("amount");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
