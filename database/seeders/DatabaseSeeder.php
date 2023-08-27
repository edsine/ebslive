<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ClaimsCompensation\Database\Seeders\ClaimsCompensationDatabaseSeeder;
use Modules\HumanResource\Database\Seeders\HumanResourceDatabaseSeeder;
use Modules\WorkflowEngine\Database\Seeders\WorkflowEngineDatabaseSeeder;
use Modules\DocumentManager\Database\Seeders\DocumentManagerDatabaseSeeder;
use Modules\EmployerManager\Database\Seeders\EmployerManagerDatabaseSeeder;
use Modules\Approval\Database\Seeders\ApprovalDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesAndPermissionsTablesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(LocalGovernmentsTableSeeder::class);
        $this->call(RealRolesTablesSeeder::class);
        $this->call(DepartmentsAndBranchesTablesSeeder::class);
        $this->call(DTAPermissionsTableSeeder::class);
        $this->call(RealUsersAndStaffTablesSeeder::class);
        $this->call(EmployersTableSeeder::class);
        $this->call(NewRolesAndPermissionsTablesSeeder::class);

        // Modules
        $this->call(WorkflowEngineDatabaseSeeder::class);
        $this->call(DocumentManagerDatabaseSeeder::class);
        $this->call(EmployerManagerDatabaseSeeder::class);
        $this->call(HumanResourceDatabaseSeeder::class);
        $this->call(ApprovalDatabaseSeeder::class);
        $this->call(ClaimsCompensationDatabaseSeeder::class);
    }
}
