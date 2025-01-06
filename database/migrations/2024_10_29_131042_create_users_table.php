<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->enum('role', ['admin', 'customer', 'vendor'])->default('customer');
            $table->string('address', 255)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('profile_image', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Additional columns
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip', 45)->nullable();
            $table->string('referral_code', 50)->nullable()->unique();
            $table->json('preferences')->nullable();
            $table->integer('reward_points')->default(0);
            $table->boolean('is_suspended')->default(false);
            $table->text('suspension_reason')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('alternate_email', 255)->nullable();
            $table->string('alternate_phone', 50)->nullable();
            $table->string('tax_id', 100)->nullable();
            $table->boolean('newsletter_subscription')->default(false);

            // Timestamps
            $table->softDeletes(); // For soft deletion
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
