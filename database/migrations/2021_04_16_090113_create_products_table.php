<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('summary');
            $table->longText('description');
            $table->string('photo');
            $table->integer('stock')->default(1);
            $table->string('size')->default('m')->nullable();
            $table->enum('condition', ['default', 'new', 'hot'])->default('default');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->float('price')->nullable()->default(123.45);            
            $table->float('discount')->nullable();
            $table->boolean('is_featured')->default(false);
            
            $table->integer('cat_id')->unsigned()->nullable();            
            $table->integer('child_cat_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('child_cat_id')->references('parent_id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
