<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LeaveRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_request', function (Blueprint $table) {
            $table->id(); 
         
             $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
             $table->foreignId('staff_id')->nullable()->constrained('staff')->onDelete('cascade');
            $table->unsignedBigInteger('leavetype_id')->nullable()->default(1);
            $table->foreign('leavetype_id')->references('id')->on('leavetype')->onDelete('cascade');
    
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('cascade');
            // $table->string('md_status')->nullable();
            // $table->string('status')->nullable();
            
            $table->dateTime('date_start_new')->nullable();
             $table->string('type')->nullable();
             $table->integer('number_days')->nullable();
             $table->longText('home_address')->nullable();
             $table->longText('home_number')->nullable();
             $table->longText('comments')->nullable();
          
             $table->string('local_council')->nullable();
             $table->string('state')->nullable();
             $table->string('phone_number')->nullable();
             $table->string('officer_relieve')->nullable();
             $table->string('signature_path')->nullable();
             $table->dateTime('end_date')->nullable();
            //  $table->integer('approve_status')->nullable()->default(0);
             $table->integer('supervisor_approval')->nullable()->default(0);
             $table->integer('hr_approval')->nullable()->default(0);
             $table->integer('hod_approval')->nullable()->default(0);
             
             $table->integer('daystaken')->nullable();
        
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
        Schema::dropIfExists('leave_requests');
    }
}
