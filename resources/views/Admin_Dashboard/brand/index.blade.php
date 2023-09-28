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
                            <th style="width: 5%">ID</th>
                            <th style="width: 20%">Brand Name</th>
                            <th style="width: 15%">Status</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    @foreach($brands as $brand) 
                    <tbody>
                        <tr class="text-center">
                            
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>
                                @if ($brand->status==1)
                                <span class="btn btn-success">Active</span>
                                @else
                                <span class="btn btn-danger">Deactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    @if ($brand->status == 1)
                                        <a href="{{ url('/brand-status'.$brand->id) }}" class="btn btn-sm btn-danger">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('/brand-status'.$brand->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas  fa-thumbs-up"></i>
                                        </a>
                                    @endif
                                
                                    <a class="btn btn-sm btn-info " href="{{ url('/brands/' . $brand->id . '/edit') }}">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                    
                                    <form action="{{ url('/brands/' . $brand->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" btn btn-sm btn-warning">
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
              </div>
            </div>
          </div>
        </div>
    </div> 
</div>
<x-adminfooter/>