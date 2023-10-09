<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
class BrandController extends Controller
{    public function index()
    {
        $brands=Brand::all();
        return view('Admin_Dashboard.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('Admin_Dashboard.brand.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands',     
        ]);
        $brand = new Brand;
        $brand->id=$request->brand;
        $brand->name=$request->name;
        $brand->save(); 
        return redirect()->back()->with('success','Brand Added Successfully');
    }
    public function change_status(Brand $brand)
    {
        if($brand->status==1){
            $brand->update(['status'=>0]);
        }
        else{
            $brand->update(['status'=>1]);
        }
        return redirect()->back()->with('success','Status Change Successfully');
    }
    public function edit(Brand $brand)
    {
        return view('Admin_Dashboard.brand.edit', compact('brand'));
    }
    public function update(Request $request,Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands',     
        ]);
        $update=$brand->update([
            'name'=>$request->name,
        ]);

        if($update)
        {
            return redirect('/brands')->with('success','Brand Updated Successfully');
        }
    }
    public function destroy(Brand $brand)
    {
        $delete=$brand->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Brand Deleted Successfully');
        }
    }
}
