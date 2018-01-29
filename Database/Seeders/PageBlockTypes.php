<?php

namespace Modules\Page\Database\Seeders;

use Backup\Util\ClassFinder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Page\Entities\PageBlockType;

class PageBlockTypesSeeder extends Seeder
{
    public function run()
    {
        $models = ClassFinder::getClassesInNamespace('Modules\Page\Entities\Blocks');

        foreach ($models as $model)
        {
            $modelReflection = new \ReflectionClass($model);

            $modelInstance = new PageBlockType();
            $modelInstance->name = $modelReflection->getShortName();
            $modelInstance->model = $modelReflection->getName();
            var_dump($modelInstance);
        }
    }
}