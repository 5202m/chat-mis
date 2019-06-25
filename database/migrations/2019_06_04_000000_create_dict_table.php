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

class CreateDictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('dict')) {
            Schema::create('dict', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('parent_id')->default(0)->comment('父ID');
                $table->string('code')->comment('字典编码');
                $table->string('name_cn')->comment('字典中文名称');
                $table->string('name_tw')->comment('字典繁体名称');
                $table->string('name_en')->comment('字典英文名称');
                $table->smallInteger('sort')->default(0)->comment('排序序列');
                $table->smallInteger('valid')->default(1)->comment('是否删除：0 、删除 ；1、正常');
                $table->smallInteger('status')->default(1)->comment('状态：0 、禁用 ；1、启动');
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
        Schema::dropIfExists('dict');
    }
}