<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assetmanagers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('supplierid');
            $table->foreignId('supply_id')->constrained();
            // $table->integer('typeid');
            $table->foreignId('assettype_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            // $table->integer('brandid');
            $table->string('assettag',)->nullable();
            $table->string('name',255)->nullable();
            $table->string('serial',255)->nullable();
            $table->string('quantity')->nullable();
            $table->date('purchasedate')->nullable();
            $table->string('cost')->nullable();
            $table->string('warranty')->nullable();
            $table->string('status')->nullable();
            $table->text('picture')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('assetmanagers');
    }
}
