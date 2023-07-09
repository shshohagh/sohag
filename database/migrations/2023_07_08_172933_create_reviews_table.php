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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            $table->integer('product_id')->nullable();
            $table->integer('stars')->nullable();
            $table->text('comment')->nullable();
            //$table->timestamps('reviewed_at')->useCurrent();
            //$table->timestamps('reviewed_updated_at')->useCurrentOnUpdate();

            $table->integer('type_id')->nullable();
            $table->integer('is_publish')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
