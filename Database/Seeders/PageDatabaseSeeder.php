<?php

namespace Modules\Page\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Page\Repositories\PageBlockRepository;
use Modules\Page\Repositories\PageRepository;
use Faker\Factory;

class PageDatabaseSeeder extends Seeder
{
	/**
	 * @var PageRepository
	 */
	private $page;

	private $block;

	private $faker;

	public function __construct(PageRepository $page, PageBlockRepository $block)
	{
		$this->page = $page;
		$this->block = $block;
		$this->faker = Factory::create();
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

		$page = $this->page->create($data);

		for($x = 0; $x < 5; $x++)
		{
			$blockData = [
				'en' => [
					'title' => $this->faker->name,
					'content' => $this->faker->text
				],
			];

			$block = $this->block->create($blockData);
			$page->blocks()->attach($block->id);
		}
	}
}
