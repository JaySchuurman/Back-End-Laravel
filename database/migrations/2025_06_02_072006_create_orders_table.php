<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Schema::create('orders', function (Blueprint $table) {
        //     $table->id(); // order_id
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        //     $table->dateTime('order_date');
        //     $table->string('status')->default('pending'); // bijv. 'pending', 'shipped', etc.
        //     $table->timestamps(); // created_at, updated_at
        // });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};