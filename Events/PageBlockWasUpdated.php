<?php
/**
 * Created by PhpStorm.
 * User: superewald
 * Date: 22.01.18
 * Time: 03:53
 */

namespace Modules\Page\Events;


use Modules\Page\Entities\PageBlock;

class PageBlockWasUpdated
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var PageBlock
     */
    public $block;

    public function __construct(PageBlock $block, array $data)
    {
        $this->data = $data;
        $this->page = $block;
    }

    /**
     * Return the entity
     */
    public function getEntity()
    {
        return $this->page;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}