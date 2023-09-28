<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    
    {
            return view('Admin_Dashboard.index');
       
    }
    public function ad_profile()
    {
        if(Session()->has('id'))
       {
        $user=User::find(Session()->get('id'));
        return view('Admin_Dashboard.profile', compact('user'));
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
    public function ourCustomers()
    {
        $customers=User::where('type','Customer')->get();
        return view('Admin_Dashboard.customers', compact('customers'));
    }
    public function changeUserStatus($status,$id)
    {
        $user = User::find($id);
        $user->status=$status;
        $user->save();
        return redirect()->back()->with('success', 'User Status changes successfully.');
    }
    public function orders()
    {
        
        $orders=DB::table('users')
        ->join('orders','orders.cust_id','users.id')
        ->select('orders.*','users.fullname','users.email' , 'users.status as userStatus')
        ->get();
        
        return view('Admin_Dashboard.orders', compact('orders'));
    }
    public function changeOrderStatus($status,$id)
    {
        
        $order = Order::find($id);
        $order->status=$status;
        $order->save();
        return redirect()->back()->with('success', 'Order Status updated successfully.');
    }

    public function view_orderDetails($id)
    {
        $orders=Order::where('orders.id',$id)->first();
        $orderItems=OrderItem::where('order_id',$id)->get();
        
      
        
        return view('Admin_Dashboard.view_orderDetails',compact('orders','orderItems'));
    }
}
