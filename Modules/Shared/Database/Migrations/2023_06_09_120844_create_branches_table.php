<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id('id');
            $table->string('branch_name')->unique()->nullable();
            $table->integer('branch_region')->nullable();
            $table->string('branch_code')->unique()->nullable();
            $table->string('last_ecsnumber')->unique()->nullable();
            $table->integer('highest_rank')->nullable();
            $table->integer('staff_strength')->nullable();
            $table->integer('managing_id')->nullable();
            $table->string('branch_email')->unique()->nullable();
            $table->string('branch_phone')->unique()->nullable();
            $table->string('branch_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches');
    }
};
