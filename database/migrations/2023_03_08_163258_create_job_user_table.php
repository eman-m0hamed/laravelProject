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
        Schema::create('job_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('job_id')->nullable();
            // $table->primary(['user_id', 'job_id']);
            $table->integer('answer_count')->default(0);
            $table->integer('rightAnswer_count')->default(0);
            $table->enum('status',['applied','pending','accepted', 'rejected'])->default('applied');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->nullOnDelete();

            $table->foreign('job_id')->references('id')->on('jobs')
            ->cascadeOnUpdate()->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_user');
    }
};
