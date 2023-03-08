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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('details');
            $table->enum('state',['available', 'unavailable'])->default('available');
            $table->timestamp('open_date')->useCurrent();
            $table->timestamp('close_date')->useCurrent();
            $table->foreignId('admin_id')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')
            ->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
