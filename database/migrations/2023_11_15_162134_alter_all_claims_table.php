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
        Schema::table('death_claims', function($table) {
            $table->integer('branch_id')->default('0');
        });
        Schema::table('accident_claims', function($table) {
            $table->integer('branch_id')->default('0');
        });
        Schema::table('disease_claims', function($table) {
            $table->integer('branch_id')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('death_claims');
        Schema::dropIfExists('accident_claims');
        Schema::dropIfExists('disease_claims');
    }
};
