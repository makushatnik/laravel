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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('content');
            $table->foreignId('author')->constrained('users');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->bigInteger('reply_to')->unsigned()->nullable();
            $table->foreign('reply_to')->references('id')->on('users')->onDelete('set null');
            $table->foreignId('author')->constrained('users');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('active')->default(true);
            $table->boolean('admin')->default(false);
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['active','admin','avatar']);
        });
    }
};
