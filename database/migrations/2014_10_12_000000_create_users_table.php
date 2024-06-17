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
            $table->string('name');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->boolean('is_admin')->default(false);
            $table->integer('is_admin')->default(0);
            // $table->string('role_id');
            // $table->foreign('role_id')->constrained()->onDelete('cascade'); // Foreign key to roles table
            $table->rememberToken();
            // $table->unsignedBigInteger('organization_id');
            // $table->foreign('organization_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
