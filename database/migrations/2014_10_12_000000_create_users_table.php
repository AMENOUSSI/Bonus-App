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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('usertype')->default('secretaire');
            $table->string('identity_reference')->unique();
            $table->string('registration_number')->unique();
            $table->unsignedBigInteger('sponsor_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('verification_code')->nullable();

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('sponsor_id')->references('id')->on('users')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('verification_code');
        });    }
};
