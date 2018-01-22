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


class PageBlockIsCreating extends AbstractEntityHook implements EntityIsChanging
{

}