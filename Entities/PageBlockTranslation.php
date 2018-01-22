<?php
/**
 * Created by PhpStorm.
 * User: superewald
 * Date: 22.01.18
 * Time: 05:52
 */

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Page\Events\PageContentIsRendering;

class PageBlockTranslation extends Model
{
    protected $table = 'page__block_translations';
    protected $fillable = [
        'title',
        'content'
    ];
}