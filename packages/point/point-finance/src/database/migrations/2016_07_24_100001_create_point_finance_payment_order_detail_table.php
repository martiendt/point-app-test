<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointFinancePaymentOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_finance_payment_order_detail', function ($table) {
            $table->increments('id');
            
            $table->integer('point_finance_payment_order_id')->unsigned()->index('point_finance_payment_order_index');
            $table->foreign('point_finance_payment_order_id', 'point_finance_payment_order_foreign')
                ->references('id')->on('point_finance_payment_order')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('coa_id')->unsigned()->index();
            $table->foreign('coa_id')
                ->references('id')->on('coa')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->integer('allocation_id')->unsigned()->index();
            $table->foreign('allocation_id')
                ->references('id')->on('allocation')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->text('notes_detail');
            $table->decimal('amount', 16, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('point_finance_payment_order_detail');
    }
}
