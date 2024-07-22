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
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('production_no');
            $table->date('date');
            $table->integer('worker_id');
            $table->integer('material_id');
            $table->integer('used_qty');
            $table->integer('product_id');
            $table->integer('qty_produced');
            $table->string('description')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=Pending, 1=Approved');
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
        Schema::dropIfExists('productions');
    }
};
