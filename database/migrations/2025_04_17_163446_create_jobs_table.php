<?php

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class);
            $table->foreignId('tag_id')->constrained('tags');
            $table->foreignIdFor(User::class,'posted_by');
            $table->string('title');
            $table->text('description');
            $table->string('salary');
            $table->date('start_date');
            $table->date('expiration_date');
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('qualification');
            $table->foreignId('career_level_id')->constrained('tags');
            $table->foreignId('employment_type_id')->nullable()->constrained('tags');
            $table->string('job_type');
            $table->boolean('is_featured');
            $table->tinyInteger('status')->default(0);
            $table->json('responsibility');
            $table->json('skill_experience');
            $table->json('experience');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
