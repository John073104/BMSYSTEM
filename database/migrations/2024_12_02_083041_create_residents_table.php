<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('place_of_birth');
            $table->integer('age');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('purok');
            $table->boolean('is_4ps_beneficiary')->default(false);
            $table->string('nationality');
            $table->string('national_id')->unique();
            $table->text('address');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
