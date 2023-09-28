<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('Admin_Dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin_Dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        
        ]);

        $category = new Category;
        $category->id=$request->category;
        $category->name=$request->name;
            $category->save();
            
            return redirect()->back()->with('success','Category Successfully Created');

    }

    /**
     * Display the specified resource.
     */
    public function change_status(Category $category)
    {
        if($category->status==1){
            $category->update(['status'=>0]);
        }
        else{
            $category->update(['status'=>1]);
        }
        return redirect()->back()->with('success','Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Admin_Dashboard.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {   
        $request->validate([
            'name' => 'required|unique:categories',   
        ]);
        
        $update=$category->update([
            'name'=>$request->name,
        ]);

        if($update)
        {
            return redirect('/categories')->with('success','Category Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $delete=$category->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Category Deleted Successfully');
        }

    }
}
