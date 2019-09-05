<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_id');
            $table->string('fname');
            $table->string('sname');
            $table->string('other_name');
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('bs_nature');
            $table->string('bs_permit')->nullable();
            $table->string('county');
            $table->string('constituency');
            $table->string('ward');
            $table->string('location');
            $table->string('chief_name');
            $table->string('chief_phone');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('members');
    }
}
