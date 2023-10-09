<?php
namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
class SubCategoryController extends Controller
{
        public function index()
    {
        $subcategories=SubCategory::all();
        return view('Admin_Dashboard.subcategory.index', compact('subcategories'));
    }
    public function create()
    {
        $categories=Category::all();
        return view('Admin_Dashboard.subcategory.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subcategory = new SubCategory;
        $subcategory->cat_id=$request->category;
        $subcategory->name=$request->name;
        $subcategory->save();
        return redirect()->back()->with('success','SubCategory Successfully Created');
    }
    public function show(SubCategory $subcategory)
    {
        if($subcategory->status==1){
            $subcategory->update(['status'=>0]);
        }
        else{
            $subcategory->update(['status'=>1]);
        }
        return redirect()->back()->with('success','Status Change Successfully');
    }
    public function edit(SubCategory $subCategory)
    {
        $categories=Category::all();
        return view('Admin_Dashboard.subcategory.edit', compact('categories','subCategory'));
    }

    public function update(Request $request,SubCategory $subCategory)
    {
        $request->validate([
            'name' => 'required' . $subCategory->id,
        ]);
        $update=$subCategory->update([
            'name'=>$request->name,
            'cat_id'=>$request->category,
          
        ]);
        if($update)
        {
            return redirect('/sub-categories')->with('success','SubCategory Updated Successfully');
        }
    }
    public function change_status(SubCategory $subcategory)
    {
        if($subcategory->status==1){
            $subcategory->update(['status'=>0]);
        }
        else{
            $subcategory->update(['status'=>1]);
        }
        return redirect()->back()->with('success','Status Change Successfully');
    }
    public function destroy(SubCategory $subCategory)
    {
        $delete=$subCategory->delete();
        if($delete)
        {
            return redirect()->back()->with('success','SubCategory Deleted Successfully');
        }
    }
}
