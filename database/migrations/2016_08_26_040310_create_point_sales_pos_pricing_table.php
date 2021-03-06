<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointSalesPosPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_sales_pos_pricing', function ($table) {
            $table->increments('id');
            $table->integer('formulir_id')->unsigned()->index('point_sales_pos_pricing_formulir_index');
            $table->foreign('formulir_id', 'point_sales_pos_pricing_formulir_foreign')
                ->references('id')->on('formulir')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('point_sales_pos_pricing');
    }
}
