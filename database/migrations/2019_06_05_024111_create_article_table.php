<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('article')) {
            Schema::create('article', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('template')->comment('模板');
                $table->integer('category_id')->comment('栏目ID');
                $table->integer('status')->default(1)->comment('状态,0为禁用，1为启用，默认为1');
                $table->string('platform')->comment('应用平台(数据字典的code，多个则逗号分隔）');
                $table->string('type')->comment('文章种类');
                $table->string('media_url')->comment('媒体地址路径');
                $table->string('media_img_url')->comment('媒体图片（视频专用字段）');
                $table->string('link_url')->comment('点击媒体链接的路径');
                $table->integer('sequence')->comment('排序');
                $table->integer('publish_start_date')->comment(' 发布开始时间');
                $table->integer('publish_end_date')->comment('发布结束时间');
                $table->integer('praise')->comment('点赞数');
                $table->integer('valid')->default(1)->comment('是否删除/有效(1为有效，0为无效）');
                $table->integer('src_id')->comment('文章来源id (如是数据导入，则对应id)');
                $table->string('category_name_path')->comment('栏目路径名(仅用于输出)');
                $table->integer('point')->comment('所需积分，资料下载');
                $table->string('create_user')->comment('创建人');
                $table->ipAddress('create_ip')->comment('创建IP');
                $table->integer('create_date')->comment('创建时间');
                $table->string('update_user')->comment('更新人');
                $table->ipAddress('update_ip')->comment('更新IP');
                $table->integer('update_date')->comment('更新时间');
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
        Schema::dropIfExists('article');
    }
}
