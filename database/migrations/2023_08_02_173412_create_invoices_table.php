<?php

use App\Models\Agent;
use App\Models\Dossier;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\AgentCategory;
use App\Models\PaymentStatus;
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
            $table->foreignIdFor(Product::class, 'product_id');
            $table->decimal('paid_amount', 10, 2);
            $table->decimal('remaining_amount', 10, 2);
            $table->boolean('product_received')->nullable();
            $table->foreignIdFor(PaymentStatus::class, 'payment_status');
            $table->foreignIdFor(Agent::class, 'agent_id');
            $table->foreignIdFor(Dossier::class, 'dossier_id');
            $table->timestamp('purchased_at')->nullable();
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
