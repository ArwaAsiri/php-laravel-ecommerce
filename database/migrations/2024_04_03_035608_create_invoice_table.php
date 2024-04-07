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
        Schema::create('invoice', function (Blueprint $table) {
              //simple invoice with only the basics, no need for user address
              $table->id();
              $table->integer('productid');
              $table->string('productname');
              $table->integer('Qty');
              $table->float('price');
              $table->float('Tax');
              $table->float('Total');
              $table->float('Discount');
              $table->float('Net');
              $table->integer('userid');
              $table->string('username');
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
