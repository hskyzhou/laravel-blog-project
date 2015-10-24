<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->default('')->comment('文章标题');
            $table->text('content')->comment('文章内容');
            $table->text('html_content')->comment('文章html内容');
            $table->integer('user_id')->default(0)->comment('作者id');
            $table->integer('catagory')->default(0)->comment('文章分类');
            $table->timestamps();

            $table->unique('title');//文章标题唯一索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
