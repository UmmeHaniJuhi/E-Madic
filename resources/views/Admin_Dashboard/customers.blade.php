<x-adminheader/>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Customer table</h4>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                @endif
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th ># </th>
                            <th >Full Name</th>
                            <th >Picture</th>
                            <th >Email</th>
                            <th >Type</th>
                            <th >Registration Date</th>
                            <th>Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach($customers as $item)
                        @php
                            $i++;
                        @endphp 
                        <tr class="text-center">
                            <td>{{$i}}</td>
                            <td>{{$item->fullname}}</td>
                            <td>
                                <img src="{{URL::asset('uploads/profiles/'.$item->picture)}}" style="width: 100px" alt="">
                            </td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->created_at}}</td>
                            <td class="font-weight-bold">{{$item->status}}</td>

                            <td>
                                @if ($item->status=="Active")
                                    <a href="{{url('changeUserStatus/Blocked/'.$item->id)}}" class="btn btn-danger">Block</a>
                                @else
                                <a href="{{url('changeUserStatus/Active/'.$item->id)}}" class="btn btn-success">Un-Block</a>
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