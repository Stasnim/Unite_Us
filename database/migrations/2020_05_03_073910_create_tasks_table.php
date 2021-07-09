<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id')->unsigned();
            $table->text('task');
            $table->integer('creator_id')->unsigned();
            $table->string('type')->default('active');
            $table->boolean('archived')->default(false);
            $table->integer('sub_id')->nullable();
            $table->integer('sub_name')->nullable();
            $table->string('sub_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
