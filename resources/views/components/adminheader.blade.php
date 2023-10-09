<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('Admin_Dashboard/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('Admin_Dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('Admin_Dashboard/css/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('Admin_Dashboard/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('Admin_Dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('Admin_Dashboard/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('Admin_Dashboard/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{asset('Admin_Dashboard/index.html')}}"><img src="{{URL::asset('img/logo1.jpg')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{asset('Admin_Dashboard/index.html')}}"><img src="{{URL::asset('img/logo11.jpg')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="Admin_Dashboard/#" data-toggle="dropdown" id="profileDropdown">
              @if (session()->has('picture'))
              <img src="{{ asset('uploads/profiles/' . session('picture')) }}" alt="profile"/>
             @endif
              
            </a>
            
          </li>
        </ul>      
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Catrgory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/categories/create')}}">Add Catrgory</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/categories')}}">View Catrgories</a></li>
           
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#subCatrgory" aria-expanded="false" aria-controls="subCatrgory">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Sub Catrgory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="subCatrgory">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{url('/sub-categories/create')}}">Add Sub-Catrgory</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('sub-categories')}}">View Sub-Catrgories</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="brand">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Brand</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="brand">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/brands/create')}}">Add Brand</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/brands')}}">View Brands</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/products/create')}}">Add Product</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/products')}}">View Product</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/ourCustomers')}}">
              <i class="fas fa-address-book menu-icon"></i>
              <span class="menu-title">View Customers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/orders')}}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/ad_profile')}}"> Profile </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/logout')}}"> Logout </a></li>
                
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>