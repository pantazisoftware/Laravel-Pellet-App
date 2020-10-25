<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('deliveries', function(Blueprint $table){
            $table->id();
            $table->integer('client_id');
            $table->integer('order_id');
            $table->datetime('delivered_at');
            $table->float('quantity', 8, 2);
            $table->float('price_product', 8, 2);
            $table->float('price_delivery', 8, 2);
            $table->boolean('status');
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
        //
    }
}
