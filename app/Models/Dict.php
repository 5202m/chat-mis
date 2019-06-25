<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Dict extends Model
{
    use AdminBuilder, ModelTree;

    public $table = 'dict';

    protected $fillable = ['code','name_cn','sort','parent_id', 'status'];

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('name_cn');
    }

    public function childDict() {
        return $this->hasMany('App\Models\Dict', 'parent_id', 'id');
    }

    public function allChildrenDicts()
    {
        return $this->childDict()->with('allChildrenDicts');
    }
}
