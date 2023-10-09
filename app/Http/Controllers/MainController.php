<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class MainController extends Controller
{
    public function index()
    {
        $allproducts = Product::latest()->limit(8)->get();
        $newArrivel = Product::where('type', 'new-arrivals')->latest()->limit(8)->get();
        $sale = Product::where('type', 'sale')->latest()->limit(8)->get();
        
        return view('index', compact('allproducts', 'newArrivel', 'sale'));
    }
    public function cart()
    {     
        $cartItems = DB::table('products')
        ->join('carts','carts.pro_id','products.id')
        ->select('products.name','products.price','products.quantity as pQua', 'products.image','carts.*')
        ->where('carts.cust_id',Session()->get('id'))->get();
        return view('cart', compact('cartItems'));
    }
    public function addToCard(Request $data)
    {
        if(Session()->has('id'))
        {
            $item=new Cart;
            $item->quantity=$data->input('quantity');
            $item->pro_id=$data->input('id');
            $item->cust_id = Session()->get('id');
            $item->save();
            return redirect()->back()->with('success', 'Item Added into Cart');
        }
        else
        {
            return redirect('login')->with('error', 'Please login to system');
        }
    }
    public function updateCart(Request $data)
    {
        if(Session()->has('id'))
        {
            $item=Cart::find($data->input('id'));
            $item->quantity=$data->input('quantity');
            $item->save();
            return redirect()->back()->with('success', 'Item quantity updated');
        }
        else
        {
            return redirect('login')->with('error', 'Please login to system');
        }
    }
    public function deleteCartItem($id)
    {
        $item=Cart::find($id);
        $item->delete();
        return redirect()->back()->with('success', 'Item has been deleted from Cart');
    }
    public function checkout(Request $data)
    {
        if(Session()->has('id'))
        {
            $order=new Order();
            $paymentMethod = $data->input('payment_method');

                if ($paymentMethod === 'delivery') {
                    $order->status = 'Pending'; // Payment on delivery
                } elseif ($paymentMethod === 'online') {
                    $order->status = 'Paid'; // Online payment
                }
            $order->cust_id=Session()->get('id');
            $order->bill=$data->input('bill');
            $order->address=$data->input('address');
            $order->phone=$data->input('phone');
            $order->fullname=$data->input('fullname');
            if($order->save())
            {
                $carts=Cart::where('cust_id', Session()->get('id'))->get();
                foreach($carts as $item)
                {
                    $product=Product::find($item->pro_id);
                    if ($product && $item->quantity > 0) {
                        $orderItem = new OrderItem();
                        $orderItem->pro_id = $item->pro_id;
                        $orderItem->quantity = $item->quantity;
                        $orderItem->price = $product->price;
                        $orderItem->order_id = $order->id;
                        $orderItem->save();
                        $product->quantity -= $item->quantity;
                        $product->save();
                        $item->delete();
                    }
                }   
            }    
            return redirect()->back()->with('success', 'Success! Your Order has been placed');
        }
        else
        {
            return redirect('login')->with('error', 'Please login to system');
        }
    }
    public function shop()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $totalProducts = Product::count();
        $products=Product::where('status',1)->latest()->paginate(12);
        return view('shop', compact('categories','subcategories','brands','products','totalProducts'));
    }
    public function myOrders()
    {
        if(Session()->has('id'))
        {
            $orders=Order::where('cust_id',Session()->get('id'))->get();
            $items = DB::table('products')
                ->join('order_items', 'order_items.pro_id', '=', 'products.id')
                ->select('products.name', 'products.image', 'order_items.quantity', 'order_items.price', 'order_items.order_id')
                ->get();
            return view('orders', compact('orders','items'));  
        }
        return redirect('login');
    }
    public function profile()
    {
        if(Session()->has('id'))
       {
        $user=User::find(Session()->get('id'));
        return view('profile', compact('user'));
       } 
            
    }
    public function updateUser(Request $request)
    {
        $rules = [
            'fullname' => 'required|string|max:255',
            'password' => 'nullable|string|min:8', 
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
   
        $user =User::find(Session()->get('id')); 
        $user->fullname = $request->input('fullname');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('uploads/profiles', $fileName);
            $user->picture = $fileName;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    public function singleProduct($id)
    {
        $product=Product::find($id);   
        $subcat_id=$product->cat_id;
        $related=Product::where('subcat_id',$subcat_id)->get();
        return view('singleProduct', compact('product','related'));
    }
    public function register()
    {
        return view('register');
    }
    public function registerUser(Request $data)
    {
        $customMessages = [
            'fullname.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'The password must be at least 8 characters long.',
            'file.required' => 'Please upload a profile picture.',
            'file.image' => 'The uploaded file must be an image.',
            'file.mimes' => 'The uploaded file must be in JPEG, PNG, JPG, or GIF format.',
            'file.max' => 'The uploaded file cannot exceed 2MB in size.',
        ];
        $data->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $customMessages);

        $newUser = new User();
        $newUser->fullname = $data->input('fullname');
        $newUser->email = $data->input('email');
        $newUser->password = bcrypt($data->input('password'));
        $newUser->picture = $data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads/profiles', $newUser->picture);
        $newUser->type = "Customer";

        if ($newUser->save()) {
            return redirect('login')->with('success', 'Congratulations! Your Account is Ready.');
        }
        return view('login');
    }

    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        Session()->forget('id');
        Session()->forget('type');
        Session()->forget('picture');
        return redirect('/login');
    }
    public function loginUser(Request $data)
    {
        $data->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $data->input('email'))->first();

        if ($user && Hash::check($data->input('password'), $user->password)) 
        {
            if($user->status=="Blocked")
            {
                return redirect('login')->with('error', 'Your Status is Blocked.');
            }
            
            Session::put('id', $user->id);
            Session::put('type', $user->type);
            Session::put('picture', $user->picture);
           
            if($user->type=='Customer')
            {
                return redirect('/');
            }
            else if($user->type=='Admin')
            {
                return redirect('/admin');
            }
            
        }
        else
        {
            return redirect('login')->with('error', 'Email / Password is Incorrect.');
        }
    } 
    public function product_by_cat($id)
    {
        $categories=Category::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('cat_id',$id)->latest()->paginate(12);
        $selectedCat = Category::find($id);
        $totalProducts = Product::where('cat_id',$id)->count();
        return view('product_by_cat', compact('categories','brands','products','selectedCat','totalProducts'));

    }
    public function product_by_brand($id)
    {
        $categories=Category::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('br_id',$id)->latest()->paginate(12);
        $selectedBrand = Brand::find($id);
        $totalProducts = Product::where('br_id',$id)->count();
        return view('product_by_brand', compact('categories','totalProducts','brands','products', 'selectedBrand'));

    }

}
