<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\WorkflowEngine\Models\Staff;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // if (Staff::count() === 0) {
            // Add default User
            $user = new Staff();
            $user->user_id = 1;
            $user->department_id = 1;
            $user->branch_id = 1;
            $user->ranking_id = 1;
            $user->dash_type = 1;
            $user->statusz = 1;
            $user->save();

           
       // }
    }
}
