<x-adminheader/>
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto grid-margin stretch-card">
            
                <div class="card">
                    
                    <div class="card-body">
                    <h4 class="card-title">My profile</h4>
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                    @endif
                    <img src="{{URL::asset('uploads/profiles/'.$user->picture)}}" class="mx-auto d-block mb-2" width="200px" alt="">
                    <form action="{{ url('updateUser') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                     
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="fullname" class="form-control mb-2" placeholder="Name" value="{{$user->fullname}}" required>
                              
                            </div>
                            <div class="col-lg-6">
                                <input type="text" value="{{$user->email}}"  class="form-control mb-2" name="email" placeholder="Email" readonly required>
                               
                            </div>
                            <div class="col-lg-12">
                                <input type="file" name="file"  class="form-control mb-2" >
                            
                            </div>
                            <div class="col-lg-12">
                                <input type="password"  class="form-control mb-2" name="password" placeholder="New Password">
                               
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" name="register" class="btn btn-info">Save Changes</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            
        </div>
      </div>
    </div>
<x-adminfooter/>
