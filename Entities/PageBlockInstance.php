<?php
namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class PageBlockInstance extends Model
{
    const TABLE = "pageblock_instances";
    const PIVOT = "pages__pageblock_instances";

    protected $table = self::TABLE;

    public function type()
    {
        $this->hasOne(PageBlockType::class);
    }

    public function data()
    {
        return ($this->type->model)::where(['id' => $this->data_id]);
    }
}