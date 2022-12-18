<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use Toastr;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
        $categories = Category::all();
        
        return view('admin.category.create')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/category/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $this->validate($request,['name'=>'required']);
        $category->name = $request->name;
        // if($category->count()<2){
            $category->save();
            Toastr::success('Category added successfully ', 'Message', ["positionClass" => "toast-top-center"]);
            return redirect()->route('category.all');
        // }
        Toastr::error('Adding More Than Two Categories Is Not Allowed', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->route('category.all');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

       return view('admin/category/edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->save();

        Toastr::info('Category Updated Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->route('category.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Toastr::warning('Catagory Delete Successfully', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->route('category.all');
    }
}

