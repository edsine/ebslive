<?php

namespace Modules\EmployerManager\Http\Controllers;

use Modules\EmployerManager\Http\Requests\CreateEmployeeRequest;
use Modules\EmployerManager\Http\Requests\UpdateEmployeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\LocalGovt;
use App\Models\State;
use Modules\EmployerManager\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Modules\EmployerManager\Imports\EmployeesImport;

class EmployeeController extends AppBaseController
{
    /** @var EmployeeRepository $employeeRepository*/
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the Employee.
     */
    public function index(Request $request)
    {
        $s_branchId = intval(session('branch_id'));
        $employees = Employer::where('branch_id', $s_branchId)->orderBy('created_at', 'DESC')->paginate(10);//$this->employeeRepository->paginate(10);

        return view('employermanager::employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new Employee. 
     */
    public function create()
    {
        return view('employermanager::employees.create');
    }

    public function createEmployee(Request $request, $id)
    {
        $employerData = Employer::findorFail($id);
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();
        $employer = $employerData->id;
        return view('employermanager::employees.create', compact('employer','state', 'local_govt', 'employerData'));
    }

    public function createBulkEmployees(Request $request, $id)
    {
        $employer = Employer::findorFail($id);
        return view('employermanager::employees.create_bulk', compact('employer'));
    }

    /**
     * Store a newly created Employee in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();

        $employee = $this->employeeRepository->create($input);

        Flash::success('Employee saved successfully.');

        return redirect(route('employer.employees', $employee->employer_id));
    }

    public function uploadbulk(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'excel' => 'required|file|mimes:xlsx,xls|max:10240',
            'employer_id' => 'required', // Add validation for employer_id
        ]);

        $employer_id = $request->employer_id;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }
        

        Excel::import(new EmployeesImport($employer_id), request()->file('excel'));

        return redirect()->route('employer.employees', $employer_id)->with('success', 'Bulk Employees uploaded successfully!');
    }

    /**
     * Display the specified Employee.
     */
    public function show($id)
    {
        $employee = $this->employeeRepository->find($id);
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        return view('employermanager::employees.show', compact('state', 'local_govt', 'employee'));
    }

    /**
     * Show the form for editing the specified Employee.
     */
    public function edit($id)
    {
        $employee = $this->employeeRepository->find($id);
        $employer = $employee->employer_id;
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        return view('employermanager::employees.edit', compact('employer','state', 'local_govt'))->with('employee', $employee);
    }

    /**
     * Update the specified Employee in storage.
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $employee = $this->employeeRepository->update($request->all(), $id);

        Flash::success('Employee updated successfully.');

        return redirect(route('employer.employees', $employee->employer_id));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $this->employeeRepository->delete($id);

        Flash::success('Employee deleted successfully.');

        return redirect(route('employees.index'));
    }
}
