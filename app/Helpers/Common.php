<?php

use Illuminate\Support\Facades\Auth;
use Modules\Shared\Models\Department;
use Illuminate\Support\Facades\Session;
use Modules\WorkflowEngine\Models\Staff;

function getDepartmentData()
{
    $departmentIds = Department::pluck('id')->toArray();

    $s_deptId = intval(session('department_id'));
    $s_branchId = intval(session('branch_id'));
    $sessionDepartmentId = $s_deptId;
    $sessionBranchId = $s_branchId;

    $departmentIdsToCheck = [5, 6, 9, 16];

    $departmentIdsToCheck1 = [1, 5, 6, 9, 16];
    $hrIdToCheck = [22, 2,3];
    $loggedInUserId = Auth::id();

    return [
        'departmentIds' => $departmentIds,
        'sessionDepartmentId' => $sessionDepartmentId,
        'departmentIdsToCheck' => $departmentIdsToCheck,
        'departmentIdsToCheck1' => $departmentIdsToCheck1,
        'hrIdToCheck' => $hrIdToCheck,
        'loggedInUserId' => $loggedInUserId,
        'sessionBranchId' => $sessionBranchId,
    ];
}

function gettingdashboardbyuserid($id){
    $staff= Staff::where('user_id','=', Auth::user()->staff->id)
        ->where('department_id', '=', );
    return $staff;
}

function getBranchRegions()
{
    $regions = [
        0 => 'Select Branch Region',
        1 => 'Abuja',
        2 => 'Bauchi',
        3 => 'Benue',
        4 => 'Borno',
        5 => 'Cross River',
        6 => 'Delta',
        7 => 'Ebonyi',
        8 => 'Edo',
        9 => 'Enugu',
        10 => 'Gombe',
        11 => 'Imo',
        12 => 'Jigawa',
        13 => 'Kaduna',
        14 => 'Kano',
        15 => 'Katsina',
        16 => 'Kebbi',
        17 => 'Kogi',
        18 => 'Kwara',
        19 => 'Lagos',
        20 => 'Nassarawa',
        21 => 'Niger',
        22 => 'Ogun',
        23 => 'Ondo',
        24 => 'Osun',
        25 => 'Oyo',
        26 => 'Plateau',
        27 => 'Rivers',
        28 => 'Sokoto',
        29 => 'Taraba',
        30 => 'Yobe',
        31 => 'Adamawa',
        32 => 'Bayelsa',
    ];
    return $regions;
}



function leave_type()
{
    $types = [
        '' => 'Select Leave with Pay',
        'vacation' => 'vacation',
        'casual'=> 'casual',
        'Examination' => 'Examination',
        'Sick leave'=>'Sick leave',
        'Maternity'=>'Maternity',
        'Paternity'=>'Paternity',
        'Study Leave without Pay'=>'Study Leave without Pay',
        'Study Leave with Pay'=>'Study Leave with Pay',
        'Leave to Attend Sporting Event'=> 'Leave to Attend Sporting Event',
        'Speacial Leave For pilgrimage'=>'Speacial Leave For pilgrimage',
        'Speacial Leave for Proffessional Activities'=>'Speacial Leave for Proffessional Activities',

        'Compassionate Leave'=>'Compassionate Leave',
        'Leave of Abscence'=> 'Leave of Abscence',
        'Annual Leave'=>'Annual Leave'

    ];
    return $types;
}


function getRanks()
{
    $regions = [
        '' => 'Select Highest Rank',
        1 => 'Managing Director',
        2 => 'Executive Directors',
        3 => 'General Managers',
        4 => 'Deputy General Managers',
        5 => 'Assistant General Managers',
        6 => 'Principal Managers',
        7 => 'Senior Managers',
        8 => 'Managers',
        9 => 'Assistant Managers',
        10 => 'Senior Officers',
        11 => 'Officers',
        12 => 'Junior Officers',
    ];
    return $regions;
}

function checkPermission($permission)
{
    $user = Auth::user();
    if($user->can($permission))
    {
        return true;
    }
    return false;
}

function enum_employer_status()
{
    $option['1'] = 'Registered';
    $option['2'] = 'Pending';

    return $option;
}

function enum_employee_status()
{
    $option['1'] = 'Registered';
    $option['2'] = 'Incomplete';

    return $option;
}

function enum_gender()
{
    $option['1'] = 'Male';
    $option['2'] = 'Female';
    $option['3'] = 'Others';

    return $option;
}

function enum_marital_status()
{
    $option['1'] = 'Single';
    $option['2'] = 'Married';
    $option['3'] = 'Widowed';
    $option['4'] = 'Divorced';
    $option['5'] = 'Separated';


    return $option;
}
