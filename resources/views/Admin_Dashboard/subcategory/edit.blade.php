<x-adminheader/>
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-6 col-md-6 mx-auto ">
            <form action="{{url('/sub-categories/'.$subCategory->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                @endif
                    <div class="card-body">
                    <h4 class="card-title">Edit Sub-Category</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                        <label for="name">Sub-Category Name</label>
                        <input value="{{$subCategory->name}}" type="text" name="name" id="name" class="form-control" placeholder="Sub-Category">	
                        <label class="control-label" for="">Select Category</label>
                                <select name="category" class="form-control">
                                    <option value="{{$subCategory->category->id}}">{{$subCategory->category->name}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        
                                </select>  
                        </div>
                        <button type="submit" class="btn btn-primary">Update Sub-Category</button>
                    
                    </form>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
<x-adminfooter/>
