<?php

namespace Modules\Assetmanager\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Assetmanager\Models\Supply;
use Illuminate\Contracts\Support\Renderable;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $types=Supply::paginate();
        $country=[
            'nigeria'=>'nigeria'
        ];

        return view('assetmanager::supply.index',compact('types','country'));
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
        $data= $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'zip'=>'required',
            'address'=>'required',
        ]);

        Supply::create($data);
        Flash::success('successfully Added');
        return redirect()->route('supply.index');
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
        $data=Supply::find($id);

        return view('assetmanager::supply.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    { $data=Supply::findOrFail($id);
        $data->update($request->all());

        Flash::success('Updated Successfully');
        return redirect()->route('supply.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data=Supply::findOrFail($id);
        $data->delete();
        Flash::success('Deleted Successfully');
        return redirect()->route('supply.index');
    }
}
