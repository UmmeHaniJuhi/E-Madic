<x-adminheader/>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0 pt-2 pb-2"> Order Details</h2>
                </div>

                <div class="card-body">
                    <div class="card card-sm">
                        <div class="card-body bg-light mb-3">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Order No:</h6>
                                    <!-- Text -->
                                    <p class="mb-lg-0 fs-sm fw-bold">
                                        {{$orders->id}}
                                    </p>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Ordered date:</h6>
                                    <!-- Text -->
                                    <p class="mb-lg-0 fs-sm fw-bold">
                                        <time datetime="2019-10-01">
                                            {{\Carbon\Carbon::parse($orders->created_at)->format('M d,Y,h:iA')}}
                                        </time>
                                    </p>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Status:</h6>
                                    <!-- Text -->
                                    <p class="mb-0 fs-sm fw-bold">
                                        {{$orders->status}}
                                    </p>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Order Amount:</h6>
                                    <!-- Text -->
                                    <p class="mb-0 fs-sm fw-bold">
                                        &#2547; {{$orders->bill}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h2 class="h5 mb-0 pt-2 pb-2"> User Details</h2>
                </div>

                <div class="card-body">
                    <div class="card card-sm">
                        <div class="card-body bg-light mb-3">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">User No:</h6>
                                    <!-- Text -->
                                    <p class="mb-lg-0 fs-sm fw-bold">
                                        {{$orders->user->id}}
                                    </p>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">User Name :</h6>
                                    <!-- Text -->
                                    <p class="mb-lg-0 fs-sm fw-bold">
                                        {{$orders->user->fullname}}
                                    </p>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Email:</h6>
                                    <!-- Text -->
                                    <p class="mb-0 fs-sm fw-bold">
                                         {{$orders->user->email}}
                                    </p>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Status:</h6>
                                    <!-- Text -->
                                    <p class="mb-0 fs-sm fw-bold">
                                        {{$orders->user->status}}
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer p-3">

                    <!-- Heading -->
                    <h6 class="mb-7 h5 mt-4">Order Items</h6>

                    <!-- Divider -->
                    <hr class="my-3">
                    <ul>
                        <li class="list-group-item">
                            <div class="row ">
                                <div class="col-4 col-md-3">
                                    <p class=" fs-sm fw-bold "> 
                                        <a class="text-body font-weight-bold">Product Image</a>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class=" fs-sm fw-bold text-center "> <!-- Added  -->
                                        <a class="text-body font-weight-bold ">Product Name</a> 
                                    </p>
                                </div>
                                <div class="col">
                                    <p class=" fs-sm fw-bold text-center"> <!-- Added  -->
                                        <a class="text-body font-weight-bold">Product Price</a> 
                                    </p>
                                </div>
                                <div class="col">
                                    <p class=" fs-sm fw-bold text-center"> <!-- Added  -->
                                        <a class="text-body font-weight-bold">Product Quantity</a> 
                                    </p>
                                </div>
                                <div class="col">
                                    <p class=" fs-sm fw-bold text-center"> <!-- Added  -->
                                        <a class="text-body font-weight-bold">Sub-Total</a> 
                                    </p>
                                </div>
                            </div>
                        </li>
                    

                    <!-- List group -->
                    
                        @foreach ($orderItems as $item)
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-4 col-md-3 ">
                                    <!-- Image -->
                                    <img src="{{url::asset('/product/'.$item->product->image)}}" style="width: 150px; height:150px" alt="" class="img-fluid">
                                </div>
                                <div class="col">
                                    <p class="mb-4 fs-sm fw-bold text-center">
                                        <a class="text-body">{{$item->product->name}} </a> <br>
                                    </p>  
                                </div>
                                <div class="col">
                                    <!-- Title -->
                                    <p class="mb-4 fs-sm fw-bold text-center">
                                        <a class="text-body">&#2547; {{$item->price}} </a> <br>
                                        
                                    </p>
                                
                                </div>
                                <div class="col">
                                    <!-- Title -->
                                    <p class="mb-4 fs-sm fw-bold text-center">
                                        <a class="text-body">{{$item->quantity}}</a> <br>
                                        
                                    </p>
                                
                                </div>
                                <div class="col">
                                    <!-- Title -->
                                    <p class="mb-4 fs-sm fw-bold text-center">
                                        <a class="text-body">&#2547;{{$item->price * $item->quantity}}</a> <br>
                                        
                                    </p>
                                
                                </div>

                            </div>
                        </li>
                        @endforeach
                        
                        
                    </ul>
                </div>  
                <div class="card-header">
                    <h2 class="h5 mb-0 pt-2 pb-2">Shipping Information</h2>
                </div>
                <div class="card-body">
                    <div class="card card-sm">
                        <div class="card-body bg-light mb-3">
                            <div class="row">
                        
                                <div class="col-8 col-lg-4">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Customer Name:</h6>
                                    <!-- Text -->
                                    <p class="mb-lg-0 fs-sm fw-bold">
                                        {{$orders->fullname}}
                                    </p>
                                </div>
                                <div class="col-8 col-lg-4">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Shipping Address:</h6>
                                    <!-- Text -->
                                    <p class="mb-lg-0 fs-sm fw-bold">
                                        {{$orders->address}}
                                    </p>
                                </div>
                                <div class="col-8 col-lg-4">
                                    <!-- Heading -->
                                    <h6 class="heading-xxxs text-muted">Phone:</h6>
                                    <!-- Text -->
                                    <p class="mb-0 fs-sm fw-bold">
                                        {{$orders->phone}}
                                    </p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                 
        </div>
   
            </div>
          </div>
        </div>
    </div> 
</div>
<x-adminfooter/>