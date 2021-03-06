<?php

use Illuminate\Database\Migrations\Migration;

class CreatePointManufactureMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_manufacture_machine', function ($table) {
            $table->increments('id');

            $table->string('code')->unique();
            $table->string('name');
            $table->text('notes')->nullable();

            $table->nullableTimestamps();

            $table->boolean('disabled')->default(false);

            $table->integer('created_by')->unsigned()->index();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->integer('updated_by')->unsigned()->index();
            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('point_manufacture_machine');
    }
}
