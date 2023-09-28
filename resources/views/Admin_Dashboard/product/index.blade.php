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
              <h4 class="card-title">Category table</h4>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th >Product Title</th>
                            <th >Image</th>
                            <th >Price</th>
                            <th >Category Name</th>
                            <th >Quantity</th>
                            <th >Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    @foreach($products as $product) 
                    <tbody>
                        <tr class="text-center">
                            
                            <td>{{$product->name}}</td>
                            <td>
                                <img src="/product/{{$product->image}}" style="width: 100px" alt="">
                            </td>
                            <td>&#2547; {{$product->price}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                @if ($product->status==1)
                                <span class="btn btn-sm btn-success">Active</span>
                                @else
                                <span class="btn btn-sm btn-danger">Deactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    @if ($product->status == 1)
                                        <a href="{{ url('/product-status' . $product->id) }}" class="btn btn-sm btn-danger">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('/product-status' . $product->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas  fa-thumbs-up"></i>
                                        </a>
                                    @endif
                                
                                    <a class="btn btn btn-sm btn-info " href="{{ url('/products/' . $product->id . '/edit') }}">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                    
                                    <form action="{{ url('/products/' . $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn btn-sm btn-warning">
                                            <span class="button-icon">
                                                <i class="ti-trash" aria-hidden="true"></i> 
                                            </span>
                                          
                                        </button>
                                    </form>
                                    
                                </div>
                            
                            </td>
                        </tr> 
                    </tbody>
                    @endforeach
                </table>	

                {{$products->onEachSide(1)->links()}}
              </div>
            </div>
          </div>
        </div>
    </div> 
</div>
<x-adminfooter/>