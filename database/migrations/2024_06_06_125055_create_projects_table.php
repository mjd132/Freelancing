<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Enums\ProjectStatus;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('freelancer_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('employer_id')->constrained('users')->onDelete('cascade');
            $table->string('title',100);
            $table->text('body');
            $table->biginteger('budget')->unsigned();
            $table->enum('last_status',ProjectStatus::values())->default(ProjectStatus::CREATED);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
