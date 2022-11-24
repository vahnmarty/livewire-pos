<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('cashier_id');
            $table->enum('order_type', ['dine-in', 'take-out', 'delivery'])->default('dine-in');
            $table->string('order_number')->nullable();
            $table->string('customer_name')->nullable();
            $table->float('subtotal', 15, 2);
            $table->float('total_discount', 15, 2);
            $table->float('total', 15, 2);
            $table->float('cash', 15, 2);
            $table->float('change', 15, 2);

            $table->float('vat_sales', 15, 2)->nullable();
            $table->float('non_vat_sales', 15, 2)->nullable();
            $table->float('zero_rated_sales', 15, 2)->nullable();
            $table->float('total_sales', 15, 2)->nullable();
            $table->float('total_vat', 15, 2)->nullable();
            $table->float('vat_exemption', 15, 2)->nullable();

            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
