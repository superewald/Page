<?php
/**
 * Created by PhpStorm.
 * User: superewald
 * Date: 22.01.18
 * Time: 03:49
 */

namespace Modules\Page\Repositories\Eloquent;


use Modules\Page\Events\PageBlockIsCreating;
use Modules\Page\Events\PageBlockIsUpdating;
use Modules\Page\Events\PageBlockWasCreated;
use Modules\Page\Events\PageBlockWasDeleted;
use Modules\Page\Events\PageBlockWasUpdated;
use Modules\Page\Repositories\PageBlockRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Page\Entities\Page;
use Modules\Page\Events\PageIsCreating;
use Modules\Page\Events\PageIsUpdating;
use Modules\Page\Events\PageWasCreated;
use Modules\Page\Events\PageWasDeleted;
use Modules\Page\Events\PageWasUpdated;
use Modules\Page\Repositories\PageRepository;

class EloquentPageBlockRepository extends EloquentBaseRepository implements PageBlockRepository
{
    public function create($data)
    {
        event($event = new PageBlockIsCreating($data));
        $block = $this->model->create($event->getAttributes());

        event(new PageBlockWasCreated($block, $data));

        return $block;
    }

    public function update($model, $data)
    {
        event($event = new PageBlockIsUpdating($model, $data));
        $model->update($event->getAttributes());

        event(new PageBlockWasUpdated($model, $data));

        return $model;
    }

    public function destroy($block)
    {
        event(new PageBlockWasDeleted($block));
        return $block->delete();
    }
}