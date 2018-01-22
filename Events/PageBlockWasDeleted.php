<?php
/**
 * Created by PhpStorm.
 * User: superewald
 * Date: 22.01.18
 * Time: 03:53
 */

namespace Modules\Page\Events;

use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;
use Modules\Page\Entities\PageBlock;


class PageBlockWasDeleted extends AbstractEntityHook implements EntityIsChanging
{
    public $block;

    public function __construct(PageBlock $block)
    {
        $this->block = $block;
    }
}