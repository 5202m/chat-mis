<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/4
 * Time: 11:46
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatClientGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('chat_client_group')) {
            Schema::create('chat_client_group', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('groupType')->index()->comment('类别');
                $table->string('clientGroupId')->index()->comment('客户组id');
                $table->string('name')->index()->comment('名称');
                $table->string('defChatGroupId')->index()->comment('默认房间组id');
                $table->integer('sequence')->default(0)->comment('排序序列');
                $table->integer('valid')->default(1)->comment('是否删除：0 、删除 ；1、正常');
                $table->integer('status')->default(1)->comment('状态：0 、禁用 ；1、启动');
                $table->string('remark')->comment('备注');
                $table->string('authorityDes')->comment('说明');
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
        Schema::dropIfExists('chat_client_group');
    }
}