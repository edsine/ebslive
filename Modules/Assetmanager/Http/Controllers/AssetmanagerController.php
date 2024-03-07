<?php

namespace Modules\Assetmanager\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shared\Models\Department;
use Modules\Assetmanager\Models\Brand;
use Modules\Assetmanager\Models\Supply;
use Modules\Assetmanager\Models\Location;
use Modules\Assetmanager\Models\Assettype;
use Illuminate\Contracts\Support\Renderable;
use Modules\Assetmanager\Models\Assetmanager;

class AssetmanagerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $types = Assetmanager::paginate(10);
        $supply= Supply::get()->pluck('name','id');
        $brand= Brand::get()->pluck('name','id');
        $asset= Assettype::get()->pluck('name','id');



        $location=Branch::get()->pluck('branch_name','id');


        $dept= Department::get()->pluck('department_unit','id');


        $user=User::get()->pluck('first_name','id');
        return view('assetmanager::index', compact('types',
        'user',
        'dept',

        'supply',
        'location',
        'brand',
        'asset'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */


    public function create()
    {
        return view('assetmanager::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // dd($input);

        $checkboxValue = $request->input('check');
        if ($input['check']) {

            $input['department_id'] = $request->input('department_id');
            $input['user_id'] = $request->input('user_id');
        } else {

            unset($input['department_id']);
            unset($input['user_id']);
        }

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = $file->hashName();
            $path = $file->store('public/storage');
            $input['picture'] = $fileName;
        }

        Assetmanager::create($input);

        Flash::success('Saved successfully');

        return redirect()->route('assetmanager.index');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('assetmanager::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data=Assetmanager::findOrFail($id);
        return view('assetmanager::edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data=Assetmanager::findOrFail($id);
        $data->update($request->all());

        Flash::success('updated successfully');
        return redirect()->route('assetmanager.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data=Assetmanager::findOrFail($id);
        $data->delete();
        Flash::success('deleted successfully');
        return redirect()->route('assetmanager.index');
    }
}
