<?php

namespace Modules\Assetmanager\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Assetmanager\Models\Assettype;
use Illuminate\Contracts\Support\Renderable;

class AssettypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $types=Assettype::paginate();

        return view('assetmanager::assettype.index',compact('types'));
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
            'description'=>'required',
        ]);

        Assettype::create($data);
        Flash::success('successfully Added');
        return redirect()->route('assettype.index');
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
        $data=Assettype::find($id);

        return view('assetmanager::assettype.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data=Assettype::findOrFail($id);
        $data->update($request->all());

        Flash::success('Updated Successfully');
        return redirect()->route('assettype.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data=Assettype::findOrFail($id);
        $data->delete();
        Flash::success('Deleted Successfully');
        return redirect()->route('assettype.index');

    }
}
