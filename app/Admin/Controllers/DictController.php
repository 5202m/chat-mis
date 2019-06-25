<?php

namespace App\Admin\Controllers;

use App\Models\Dict;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Tree;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Box;
use Encore\TreeTable\TreeTable;

class DictController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $dictList = Dict::with('allChildrenDicts')->paginate();
        $urls = ['create'=>'dict/create'];
        $headers = [['field'=>'id','title'=>'ID'],['field'=>'code','title'=>'字典编码'],['field'=>'name_cn','title'=>'字典名称'],['field'=>'status','title'=>'状态'],['field'=>'operate','title'=>'操作']];
        $columns = ['id', 'code', 'name_cn', 'status', 'operate'];
        $style = ['table-bordered','table-hover', 'table-striped'];
        $options = [
            'paging' => true,
            'lengthChange' => false,
            'searching' => false,
            'ordering' => true,
            'info' => true,
            'autoWidth' => false,
        ];
        $formats = ['status'=>['0'=>'禁用','1'=>'启用']];
        $operates = [['cls'=>'edit', 'url'=>'dict/%s/edit'], ['cls'=>'trash', 'url'=>'dict/%s']];
        $treeTable = new TreeTable($urls, $headers, $columns, $dictList->items(), $style, $options, $formats, $operates);
        return $content->header('字典管理')
            ->body($treeTable->render());
    }

    public function list($parent_id){
        return Dict::query()->where('parent_id', $parent_id)->orderBy('sort', 'asc')->paginate();
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('详情')
            ->body($this->detail($id));
    }


    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('新增')
            ->body($this->form());
    }

    public function delete()
    {

    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Dict::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $dict = new Dict();
        $form = new Form($dict);

        $form->display('id', 'ID');

        $form->select('parent_id', '父级')->options($dict::selectOptions());
        $form->text('code', '字典编码')->rules('required');
        $form->text('name_cn', '中文名称')->rules('required');
        $form->text('name_tw', '繁体名称')->rules('required');
        $form->text('name_en', '英文名称')->rules('required');
        $form->number('sort', '排序')->rules('required')->default(1);
        $form->select('status', '状态')->options(array('0'=>'禁用','1'=>'启用'))->default(1);

        $form->saving(function (Form $form) {});//提交保存，可在回调函数中添加逻辑判断

        return $form;
    }
}
