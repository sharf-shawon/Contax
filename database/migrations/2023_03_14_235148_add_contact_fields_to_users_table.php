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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', $length=15)->unique();
            $table->string('work_phone', $length=15)->nullable();
            $table->string('home_phone', $length=15)->nullable();
            $table->string('avatar')->nullable();
            $table->date('dob')->nullable();
            $table->string('bio', $length = 500)->nullable();
            $table->string('company')->nullable();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('custom1_label')->nullable();
            $table->string('custom1_value')->nullable();
            $table->string('custom2_label')->nullable();
            $table->string('custom2_value')->nullable();
            $table->string('custom3_label')->nullable();
            $table->string('custom3_value')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('work_phone');
            $table->dropColumn('home_phone');
            $table->dropColumn('avatar');
            $table->dropColumn('dob');
            $table->dropColumn('bio');
            $table->dropColumn('company');
            $table->dropColumn('title');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('postal_code');
            $table->dropColumn('website');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('instagram');
            $table->dropColumn('linkedin');
            $table->dropColumn('github');
            $table->dropColumn('youtube');
            $table->dropColumn('tiktok');
            $table->dropColumn('custom1_label');
            $table->dropColumn('custom1_value');
            $table->dropColumn('custom2_label');
            $table->dropColumn('custom2_value');
            $table->dropColumn('custom3_label');
            $table->dropColumn('custom3_value');
            $table->dropColumn('phone_verified_at');
        });
    }
};
