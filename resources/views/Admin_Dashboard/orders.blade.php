<x-adminheader/>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                @endif
              <h4 class="card-title">Orders table</h4>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            
                            <th >Customer Email</th>
                            <th >Bill</th>
                            <th >Order Status</th>
                            <th>Order Details</th>
                            <th >Order Date</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    @foreach($orders as $item) 
                    <tbody>
                        <tr class="text-center">
                            
                           
                            <td>
                                {{$item->email}}
                            </td>
                            <td>&#2547; {{$item->bill}}</td>
                           
                            <td><label class="badge badge-success">{{$item->status}}</label></td>
                           <td>
                            <a href="{{url('/view_orderDetails/'.$item->id)}}" class="btn btn-sm btn-primary">Details</a>
                           </td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                @if ($item->status=='Paid')
                                <a href="{{url('changeOrderStatus/Accepted/'.$item->id)}}" class="btn btn-sm btn-success">Accept</a>
                                <a href="{{url('changeOrderStatus/Rejected/'.$item->id)}}" class="btn btn-sm btn-danger">Reject</a>
                                @elseif ($item->status=='Accepted')
                                <a href="{{url('changeOrderStatus/Delivered/'.$item->id)}}" class="btn btn-sm btn-warning">Completed</a>
                                @elseif ($item->status=='Delivered')
                                <label class="badge badge-secondary">Already Delivered</label>
                                
                                @else
                                <a href="{{url('changeOrderStatus/Accepted/'.$item->id)}}" class="btn btn-sm btn-info">Accepted</a>
                                @endif
                                
                            </td>
                        </tr> 
                    </tbody>
                    @endforeach
                </table>	
              </div>
            </div>
          </div>
        </div>
    </div> 
</div>
<x-adminfooter/>