<?php

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
        Schema::table("users", function (Blueprint $table) {
            $table->enum("type",["individual","legal-entity","homeowners-association"])->nullable();
            $table->string('address')->nullable();
            $table->string('address_work')->nullable();
            $table->string('phone')->nullable();
            $table->string('cui')->nullable();
            $table->string('cif')->nullable();
            $table->string('cnp')->nullable();
            $table->integer('onrc_number')->nullable();
            $table->string('contract_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->integer('inhabitants')->nullable();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
