<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary');
            $table->text('description')->nullable();
            $table->text('quote')->nullable();
            $table->string('photo')->nullable();
            $table->integer('post_cat_id')->unsigned()->nullable();
            $table->integer('post_tag_id')->unsigned()->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->foreign('post_cat_id')->references('id')->on('post_categories')->onDelete('cascade');
            $table->foreign('post_tag_id')->references('id')->on('post_tags')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
