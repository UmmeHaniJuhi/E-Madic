<x-adminheader/>
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <form action="{{url('/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">Eadit Product</h4>
                        <form class="forms-sample">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input value="{{$product->name}}" type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <input value="{{$product->price}}"  type="text" name="price" id="price" class="form-control" placeholder="Enter Product Price" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity">Product Quantity</label>
                                        <input value="{{$product->quantity}}"  type="number" name="quantity" id="quantity" class="form-control" placeholder="Product quantity" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category" class="form-control">
                                            <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Select Sub-Category</label>
                                        <select name="subcategory" class="form-control">
                                            <option value="{{$product->subcategory->id}}">{{$product->subcategory->name}}</option>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Brand</label>
                                        <select name="brand" class="form-control">
                                            <option value="{{$product->brand->id}}">{{$product->brand->name}}</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach    
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Type</label>
                                        <select  name="type" class="form-control">
                                            <option value="{{$product->type}}">{{$product->type}}</option>
                                            <option value="Best Sellers">Best Sellers</option>
                                            <option value="new-arrivals">New Arrivals</option>
                                            <option value="sale">Sale</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Product Image</label>
                                        <input value="{{$product->image}}" type="file" name="image" id="image" class="form-control" placeholder="Product image"> </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <input value="{{$product->description}}"  type="text" name="description" id="description" class="form-control" placeholder="Product description" required>
                            </div>
        
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
<x-adminfooter/>
