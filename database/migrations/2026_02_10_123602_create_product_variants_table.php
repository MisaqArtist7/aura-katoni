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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            // رفرنس به محصول
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('sku')->unique(); // کد محصول، اختیاری ولی خیلی مفیده

            $table->string('size', 50); // سایز محصول (مثلاً 42 یا M/L)
            $table->string('color', 50); // رنگ

            $table->unsignedBigInteger('price'); // قیمت اصلی
            $table->unsignedBigInteger('discount_price')->nullable(); // قیمت تخفیفی

            $table->unsignedInteger('stock')->default(0); // موجودی

            $table->boolean('is_active')->default(true); // فعال/غیرفعال کردن واریانت

            $table->timestamps();

            // جلوگیری از رکورد تکراری سایز و رنگ برای یک محصول
            $table->unique(['product_id', 'size', 'color']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
