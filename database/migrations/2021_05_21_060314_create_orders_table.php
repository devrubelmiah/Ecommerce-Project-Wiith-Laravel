<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('shipping_id')->unsigned()->nullable();
            $table->string('order_number');
            $table->float('sub_total');
            $table->float('coupon')->nullable();
            $table->float('total_amount')->nullable();
            $table->integer('quantity');
            $table->enum('payment_method', ['cod', 'paypal'])->default('cod');
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
            $table->enum('status', ['new', 'proccess', 'delivered', 'cancel'])->default('new');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('post_conde')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('orders');
    }


}
