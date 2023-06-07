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
        Schema::create('rm_performance', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('cust');
            $table->string('model');
            $table->string('part_no_kbn');
            $table->string('jenis');
            $table->string('bq');
            $table->string('spec_size_mateial');
            $table->string('vendor');
            $table->string('line');
            $table->string('rak');
            $table->string('std_pck_pcs');
            $table->integer('min');
            $table->integer('max');
            $table->integer('act_kbn');
            $table->integer('act_pcs');
            $table->integer('status_moving');
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
        Schema::dropIfExists('rm_performance');
    }
};
