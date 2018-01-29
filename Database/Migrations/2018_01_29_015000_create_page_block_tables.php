<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Page\Entities\PageBlockType;
use Modules\Page\Entities\PageBlockInstance;

class CreatePageBlockTables extends Migration
{
    public function up()
    {
        Schema::create(PageBlockType::TABLE, function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');

            $table->string('model');
            $table->string('name');
        });

        Schema::create(PageBlockInstance::TABLE, function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on(PageBlockType::TABLE);

            $table->integer('data_id')->unsigned();
        });

        Schema::create(PageBlockInstance::PIVOT, function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');

            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('page__pages');

            $table->integer('instance_id')->unsigned();
            $table->foreign('instance_id')->references('id')->on(PageBlockInstance::TABLE);
        });
    }

    public function down()
    {
        Schema::drop(PageBlockType::TABLE);
        Schema::drop(PageBlockInstance::TABLE);
        Schema::drop(PageBlockInstance::PIVOT);
    }
}