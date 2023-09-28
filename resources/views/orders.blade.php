<x-header/>
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>My Order History</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="section-title">
                        <h2>My Order History</h2>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Total Bill</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>View Products</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($orders as $item)
                            @php
                                $i++;
                            @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>&#2547; {{$item->bill}}</td>
                                    <td>{{$item->fullname}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td><!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$i}}">
                                             Products
                                        </button>
                                        
                                        <!-- The Modal -->
                                        <div class="modal" id="myModal{{$i}}">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                        
                                              <!-- Modal Header -->
                                              <div class="modal-header">
                                                <h4 class="modal-title">All Products</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              </div>
                                        
                                              <!-- Modal body -->
                                              <div class="modal-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Sub Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($items as $itm)
                                                        @if ($item->id==$itm->order_id)
                                                            
                                                        <tr>
                                                            <td><img src="{{url::asset('product/'.$itm->image)}}" width="100px" class="img-fluid" alt="">
                                                            {{$itm->name}}</td>
                                                            <td>{{$itm->quantity}}</td>
                                                            <td>{{$itm->price}}</td>
                                                            <td>&#2547;{{$itm->price * $itm->quantity}}</td>
                                                        </tr>
                                                        @endif
                                                            
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                              </div>
                                        
                                              <!-- Modal footer -->
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                              </div>
                                        
                                            </div>
                                          </div>
                                        </div></td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    
<x-footer/>
