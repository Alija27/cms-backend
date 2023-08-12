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
        Schema::create('book_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("book_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->datetime("issue_date");
            $table->datetime("return_date")->nullable();
            $table->string("status")->default("issued");
            $table->string("book_code");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_transactions');
    }
};
