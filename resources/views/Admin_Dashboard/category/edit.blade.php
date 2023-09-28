<x-adminheader/>
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-6 col-md-6 mx-auto ">
            <form action="{{url('/categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                @endif
                    <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                        <label for="name">Category Name</label>
                        <input value="{{$category->name}}" type="text" name="name" id="name" class="form-control" placeholder="Category">	
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    
                    </form>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
<x-adminfooter/>
