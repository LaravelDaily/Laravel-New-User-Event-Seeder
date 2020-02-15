<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTaskTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('task_task_tag', function (Blueprint $table) {
            $table->unsignedInteger('task_id');
            $table->foreign('task_id', 'task_id_fk_990435')->references('id')->on('tasks')->onDelete('cascade');
            $table->unsignedInteger('task_tag_id');
            $table->foreign('task_tag_id', 'task_tag_id_fk_990435')->references('id')->on('task_tags')->onDelete('cascade');
        });
    }
}
