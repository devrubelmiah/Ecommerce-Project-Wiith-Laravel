<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorgyBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorgy__blog__posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('post_cat_id');
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categ')->onDelete('cascade');

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
        Schema::dropIfExists('categorgy__blog__posts');
    }
}
