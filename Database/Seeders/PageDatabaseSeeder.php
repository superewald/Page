<?php

namespace Modules\Page\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Page\Repositories\PageRepository;

class PageDatabaseSeeder extends Seeder
{
    /**
     * @var PageRepository
     */
    private $page;

    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    public function run()
    {
        Model::unguard();

        $data = [
            'template' => 'home',
            'is_home' => 1,
            'en' => [
                'title' => 'Home page',
                'slug' => 'home',
                'meta_title' => 'Home page',
            ],
        ];
        $this->page->create($data);
    }
}
