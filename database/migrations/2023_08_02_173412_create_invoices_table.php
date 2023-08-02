<?php

use App\Models\ProductType;
use App\Models\AgentCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductType::class, 'product_type');
            $table->foreignIdFor(AgentCategory::class, 'agent_category');
            $table->decimal('product_price', 10, 2);
            $table->decimal('paid_amount', 10, 2);
            $table->decimal('remaining_amount', 10, 2);
            $table->boolean('product_received');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
