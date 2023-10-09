<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
        $products=Product::paginate(10);
        return view('Admin_Dashboard.product.index', compact('products'));
    }
    public function create()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        return view('Admin_Dashboard.product.create', compact('categories','subcategories','brands'));      
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',  
            'price' => 'required|numeric|min:0',  
            'quantity' => 'required|numeric|min:0',  
        ]);

        $product = new Product;
        $product->id = $request->product;
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->br_id = $request->brand;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(public_path('product'),$filename);
            $product->image=$filename;
        }
            $product->save();
            return redirect()->back()->with('success','Product Successfully Added');
    }
    public function change_status(Product $product)
    {
        if($product->status==1){
            $product->update(['status'=>0]);
        }
        else{
            $product->update(['status'=>1]);
        }
        return redirect()->back()->with('success','Status Change Successfully');
    }
    public function edit(Product $product)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        return view('Admin_Dashboard.product.edit', compact('categories','subcategories','brands','product'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'subcategory' => 'required|exists:sub_categories,id',
            'brand' => 'required|exists:brands,id',
            'quantity' => 'required|numeric',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = $product->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('product'), $filename);
        }    
        $update = $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'cat_id' => $request->category,
            'subcat_id' => $request->subcategory,
            'br_id' => $request->brand,
            'image' => $filename, 
            'description' => $request->description,
        ]);

        if ($update) {
            return redirect('/products')->with('success', 'Product Updated Successfully');
        }
    }
    public function destroy(Product $product)
    {
        $delete=$product->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Product Deleted Successfully');
        }
    }
}
