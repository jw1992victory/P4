<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->timestamps();

            $table->integer('lost_or_found');
            $table->string('location');
            $table->integer('category_id')->unsigned();
            $table->integer('lost_user_id')->nullable();
            $table->integer('found_user_id')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('discription');
            $table->integer('claimed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
        //
    }
}
