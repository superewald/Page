<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Modules\Page\Entities\Blocks\TeaserBlock;

class CreateTeaserBlock extends Migration
{
    public function up()
    {
        Schema::create(TeaserBlock::TABLE, function (Blueprint $table) {
            $table->enginge = "InnoDB";
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->string('icon');

            $table->string('content');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop(TeaserBlock::TABLE);
    }
}