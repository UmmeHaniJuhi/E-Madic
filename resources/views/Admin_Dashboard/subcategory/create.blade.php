<x-adminheader/>
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-6 col-md-6 mx-auto ">
            <form action="{{url('/sub-categories/')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                    @endif
                    <div class="card-body">
                    <h4 class="card-title">Add Sub-Category</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="name">Sub-Category Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Sub-Category" required>
                            <label class="control-label" for="">Select Category</label>
                                <select name="category" class="form-control">
                                    <option>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        
                                </select>  
                    
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Create</button>
                    
                    </form>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
<x-adminfooter/>
