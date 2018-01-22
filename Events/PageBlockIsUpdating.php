<?php
/**
 * Created by PhpStorm.
 * User: superewald
 * Date: 22.01.18
 * Time: 03:52
 */

namespace Modules\Page\Events;

use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;
use Modules\Page\Entities\PageBlock;


class PageBlockIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    private $block;

    public function __construct(PageBlock $block, array $attributes)
    {
        $this->block = $block;
        parent::__construct($attributes);
    }

    public function getPageBlock()
    {
        return $this->block;
    }
}