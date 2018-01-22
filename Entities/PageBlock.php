<?php
namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class PageBlock extends Model
{
    use Translatable;

    protected $table = 'page__blocks';

    public $translatedAttributes = [
        'title',
        'content'
    ];

    protected $fillable = [
        'title',
        'content'
    ];
}