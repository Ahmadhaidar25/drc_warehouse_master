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
        Schema::create('barang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('status');
            $table->string('cust');
            $table->string('part_no');
            $table->string('part_name');
            $table->string('line_proces');
            $table->string('box_type');
            $table->integer('qty_kanban');
            $table->integer('min_stock');
            $table->integer('max_stock');
            $table->integer('act_stock');
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
        Schema::dropIfExists('barang');
    }
};
