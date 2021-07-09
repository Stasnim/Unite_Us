<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('code')->unique()->nullable();
            $table->integer('max_member')->default(5)->unsigned();
            $table->integer('active_members')->default(1)->unsigned();
            $table->integer('requested')->default(0)->unsigned();
            $table->text('tags')->nullable();
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
        Schema::dropIfExists('groups');
    }
}
