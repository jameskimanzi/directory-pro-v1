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
            $table->string('other_name')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('bs_nature');
            $table->string('bs_permit');
            $table->unsignedBigInteger('county_id');
            $table->unsignedBigInteger('constituency_id');
            $table->unsignedBigInteger('ward_id');
            $table->unsignedBigInteger('location_id');
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
