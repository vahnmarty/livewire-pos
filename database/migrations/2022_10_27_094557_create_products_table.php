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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('type')->comment('[1] = Quantifiable; [2] = Menu');
            $table->string('name');
            $table->string('description')->nullable();
            $table->float('price', 15, 3);
            $table->string('image')->nullable();
            $table->boolean('active')->default(true)->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('products');
    }
};
