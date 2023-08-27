<?php

namespace Modules\Leaves\Http\Controllers;

use Modules\Leaves\Http\Requests\CreateleavesRequest;
use Modules\Leaves\Http\Requests\UpdateleavesRequest;
use App\Http\Controllers\AppBaseController;
use Modules\Leaves\Repositories\leavesRepository;
use Illuminate\Http\Request;
use Flash;

class leavesController extends AppBaseController
{
    /** @var leavesRepository $leavesRepository*/
    private $leavesRepository;

    public function __construct(leavesRepository $leavesRepo)
    {
        $this->leavesRepository = $leavesRepo;
    }

    /**
     * Display a listing of the leaves.
     */
    public function index(Request $request)
    {
        $leaves = $this->leavesRepository->paginate(10);

        return view('leaves.index')
            ->with('leaves', $leaves);
    }

    /**
     * Show the form for creating a new leaves.
     */
    public function create()
    {
        return view('leaves.create');
    }

    /**
     * Store a newly created leaves in storage.
     */
    public function store(CreateleavesRequest $request)
    {
        $input = $request->all();

        $leaves = $this->leavesRepository->create($input);

        Flash::success('Leaves saved successfully.');

        return redirect(route('leaves.index'));
    }

    /**
     * Display the specified leaves.
     */
    public function show($id)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        return view('leaves.show')->with('leaves', $leaves);
    }

    /**
     * Show the form for editing the specified leaves.
     */
    public function edit($id)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        return view('leaves.edit')->with('leaves', $leaves);
    }

    /**
     * Update the specified leaves in storage.
     */
    public function update($id, UpdateleavesRequest $request)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        $leaves = $this->leavesRepository->update($request->all(), $id);

        Flash::success('Leaves updated successfully.');

        return redirect(route('leaves.index'));
    }

    /**
     * Remove the specified leaves from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        $this->leavesRepository->delete($id);

        Flash::success('Leaves deleted successfully.');

        return redirect(route('leaves.index'));
    }
}
