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
        Schema::create('memo_has_users', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('memo_id')->constrained('memos');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('assigned_by')->constrained('users')->onDelete('no action');
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
        Schema::drop('memo_has_users');
    }
};
