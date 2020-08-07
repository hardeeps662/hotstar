<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $video = Video::where('name', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->orWhere('tag', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->orWhere('subcategory_id', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $video = Video::latest()->paginate($perPage);
        }

        return view('video.index', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {  
        $categories=\App\category::get();
        $subcategories=\App\subcategory::get();
        return view('video.create',compact('categories','subcategories'));
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
			'image' => 'required',
			'video' => 'required',
			'subcategory_id' => 'required',
			'category_id' => 'required'
		]);
        $requestData = $request->all();
       // dd($requestData);
        if ($request->has('image')) {
           $extension=$request->image->extension();
           $image_Name=uniqid().'.'.$extension;
           $path = $request->file('image')->storeAs('public/images', $image_Name);
        }
        if ($request->has('video')) {
           $extension=$request->video->extension();
           $video_name=uniqid().'.'.$extension;
           $path = $request->file('video')->storeAs('public/videos', $video_name);
        }

            $videos=new Video;
            $videos->name=$request->name;
            $videos->details=$request->details;
            $videos->tag=$request->tag;
            $videos->image=$image_Name;
            $videos->video=$video_name;
            $videos->subcategory_id=$request->subcategory_id;
            $videos->category_id=$request->category_id;
            $videos->save();

        return redirect('videos')->with('flash_message', 'Video added!');
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
        $video = Video::findOrFail($id);

        return view('video.show', compact('video'));
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
        $video = Video::findOrFail($id);

        return view('video.edit', compact('video'));
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
			'image' => 'required',
			'video' => 'required',
			'subcategory_id' => 'required',
			'category_id' => 'required'
		]);
        $requestData = $request->all();
        
        $video = Video::findOrFail($id);
        $video->update($requestData);

        return redirect('video')->with('flash_message', 'Video updated!');
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
        Video::destroy($id);

        return redirect('video')->with('flash_message', 'Video deleted!');
    }
}
