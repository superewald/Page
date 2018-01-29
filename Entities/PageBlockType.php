<?php
namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class PageBlockType extends Model
{
    const TABLE = 'pageblock_types';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'model'
    ];
}