<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 8;

        if (!empty($keyword)) {
            $subcategory = Subcategory::where('name', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $subcategory = Subcategory::latest()->paginate($perPage);
        }

        return view('subcategory.index', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category =\App\Category::pluck('name','id')->toArray();
        //dd($category);

        return view('subcategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'category_id' => 'required'
		]);
        $requestData = $request->all();
        
        Subcategory::create($requestData);

        return redirect('subcategory')->with('flash_message', 'Subcategory added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        return view('subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        return view('subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'category_id' => 'required'
		]);
        $requestData = $request->all();
        
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($requestData);

        return redirect('subcategory')->with('flash_message', 'Subcategory updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Subcategory::destroy($id);

        return redirect('subcategory')->with('flash_message', 'Subcategory deleted!');
    }
}
