<?php
namespace Modules\Page\Entities;


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