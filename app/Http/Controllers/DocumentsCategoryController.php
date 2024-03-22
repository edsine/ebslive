<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentsCategoryRequest;
use App\Http\Requests\UpdateDocumentsCategoryRequest;
use App\Models\DocumentsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents_categories = DocumentsCategory::paginate(10);

        return view('documents_categories.index', compact('documents_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('documents_categories.create');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentsCategoryRequest $request)
{
    try {
        $validated = $request->validated();
        $documents_category = DocumentsCategory::create($validated);
        return redirect()->route('documents_category.index')->with('success', 'Document category added successfully!');
    } catch (\Throwable $e) {
        // Log the error or handle it as needed
        return redirect()->back()->withErrors(['error' => 'Failed to add document category. Please try again.']);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(DocumentsCategory $documents_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentsCategory $documents_category)
    {
        return view('documents_categories.edit', compact(['documents_category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentsCategoryRequest $request, DocumentsCategory $documents_category)
    {
        $validated = $request->validated();
        $documents_category->update($validated);
        return redirect()->route('documents_category.index')->with('success', 'Document category udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentsCategory $documents_category)
    {
        if ($documents_category->delete())
            return redirect()->back()->with('success', 'Document category deleted successfully!');
        return redirect()->back()->with('error', 'Document category could not be deleted!');
    }

    
}
