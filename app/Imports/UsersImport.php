<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Modules\WorkflowEngine\Models\Staff;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserImportedNotification; 
use App\Mail\BulkStaffEmail;
use Illuminate\Support\Facades\Mail;



class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        /* $usersData = [];
        $staffData = []; */

        $skippedFirstRow = false;
        
        foreach ($rows as $row) {
            if (!$skippedFirstRow) {
                $skippedFirstRow = true;
                continue; // Skip the first row
            }
            $usersData = [
                'email' => $row[1],
                'first_name' => $row[2],
                'middle_name' => $row[3],
                'last_name' => $row[4],
                'password' => Hash::make('Testingdata1!'),
                'status' => 1,
            ];
            $users = User::create($usersData);
            $users->assignRole($row[20]);

            $staffData = [
                // Extract other fields and populate staff data array
                'department_id' => $row[5],
                'ranking_id' => $row[6],
                'branch_id' => $row[7],
                'dash_type' => $row[8],
                'gender' => $row[9],
                'staff_id' => $row[10],
                'region' => $row[11],
                'phone' => $row[12],
                'alternative_email' => $row[13],
                'created_by' => $row[14],
                'approved_by' => $row[15],
                'modified_by' => $row[16],
                'office_position' => $row[17],
                'position' => $row[18],
                'about_me' => $row[19],
                'user_id' => $users->id,
                'updated_at' => now(),
                'created_at' => now(),
            ];
            Staff::create($staffData);

             // Create cPanel webmail email address and password
             $email = $usersData['email'];
             $password = "Testingdata1!";
             $add_url = "https://nsitf.gov.ng:2083/execute/Email/add_pop?email=" . urlencode($email) . "&password=" . urlencode($password) . "&domain=nsitf.gov.ng";
     
             $curl = curl_init();
     
             curl_setopt_array($curl, array(
                 CURLOPT_URL => $add_url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => "",
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 30,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => "GET",
                 CURLOPT_HTTPHEADER => array(
                     "Authorization: cpanel nsitfmai:CBQGD88REZCOO15NI5VB64VEGQLPVOBQ",
                     "Cache-Control: no-cache",
                 ),
             ));
     
             $response = curl_exec($curl);
             $err = curl_error($curl);
     
             curl_close($curl);

            // Send notification to the user
            $primaryRecipientEmail = $row[13];
            $ccEmail = $email;
            
            Mail::to($primaryRecipientEmail)->send(new BulkStaffEmail($users, $ccEmail));
            //Notification::send($users, new UserImportedNotification($users)); // Pass necessary data to the notification
        }
   
        /* $this->usersData = $usersData;
        $this->staffData = $staffData; */
    }

   /*  public function getUsersData()
    {
        return $this->usersData;
    }

    public function getStaffData()
    {
        return $this->staffData;
    } */
}

