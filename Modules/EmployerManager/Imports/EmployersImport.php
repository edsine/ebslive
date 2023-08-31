<?php

namespace Modules\EmployerManager\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Notification;
use Modules\EmployerManager\Notifications\EmployerImportedNotification;

class EmployersImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        $skippedFirstRow = false;

        foreach ($rows as $row) {
            if (!$skippedFirstRow) {
                $skippedFirstRow = true;
                continue; // Skip the first row
            }

            $employerData = [
                // Extract other fields and populate staff data array
                'company_email' => $row[1],
                'contact_firstname' => $row[2],
                'contact_middlename' => $row[3],
                'contact_surname' => $row[4],
                'ecs_number' => $row[5],
                'company_name' => $row[6],
                'password' => Hash::make('12345678'),
                'company_address' => $row[7],
                'company_rcnumber' => $row[8],
                'contact_position' => $row[9],
                'contact_number' => $row[10],
                'company_localgovt' => 1,//$row[11],
                'company_state' => $row[12],
                'business_area' => $row[13],
                'inspection_status' => 0,
                'company_phone' => $row[14],
                'cac_reg_year' => $row[15],
                'number_of_employees' => $row[16],
                'status' => 0,
                'registered_date' => date("Y-m-d"),
                'branch_id' => $row[17],
                'paid_registration' => 0,
                'user_id' => 1,
                'region_id' => 1,
                'transaction_id' => 1,
                'contribution_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => 1,
                //'account_officer_id' => 1,
            ];
            Employer::create($employerData);

            // Send notification to the user
            Notification::send($employerData, new EmployerImportedNotification($employerData));
        }
    }
}
