<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('article_detail')) {
            Schema::create('article_detail', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('article_id')->comment('文章ID');
                $table->integer('user_id')->comment('作者ID');
                $table->string('lang', 50)->comment('语言');
                $table->string('title')->comment('标题');
                $table->text('content')->comment('内容');
                $table->string('pic')->comment('图片');
                $table->string('remark', 300)->comment('备注');
                $table->string('seo_title', 300)->comment('seo标题');
                $table->string('seo_keyword', 500)->comment('seo关键字');
                $table->string('seo_description', 800)->comment('seo描述');
                $table->string('link_url')->comment('链接');
                $table->string('tag')->comment('标签');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_detail');
    }
}
