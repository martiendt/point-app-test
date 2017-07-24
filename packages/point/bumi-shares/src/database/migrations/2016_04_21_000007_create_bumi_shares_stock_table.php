<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBumiSharesStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bumi_shares_stock', function ($table) {
            $table->increments('id');
            
            $table->integer('formulir_id')->unsigned()->index();
            $table->foreign('formulir_id')
                ->references('id')->on('formulir')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('shares_id')->unsigned()->index();
            $table->foreign('shares_id')
                ->references('id')->on('bumi_shares')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->integer('owner_group_id')->unsigned()->index();
            $table->foreign('owner_group_id')
                ->references('id')->on('bumi_shares_owner_group')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->integer('owner_id')->unsigned()->index();
            $table->foreign('owner_id')
                ->references('id')->on('bumi_shares_owner')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->integer('broker_id')->unsigned()->index();
            $table->foreign('broker_id')
                ->references('id')->on('bumi_shares_broker')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->timestamp('date')->useCurrent();

            $table->double('quantity', 16, 4);
            $table->double('remaining_quantity', 16, 4);
            $table->double('price', 16, 4);
            $table->double('subtotal', 16, 4);
            $table->double('fee', 16, 4);
            $table->double('total', 16, 4);

            $table->double('acc_quantity', 16, 4);
            $table->double('acc_subtotal', 16, 4);
            $table->double('acc_total', 16, 4);

            $table->double('average_price', 16, 4);

            $table->boolean('recalculate')->default(false);
            $table->text('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bumi_shares_stock');
    }
}
