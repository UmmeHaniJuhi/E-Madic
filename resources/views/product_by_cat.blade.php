<x-header />

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            <a href="{{url('/shop')}}">Shop</a>
                            <span>Category</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                               
                                                <ul class="nice-scroll">
                                                    @foreach ($categories as $category)
                                                        @php
                                                            $catProductCount=\App\Models\Product::catProductCount($category->id);
                                                        @endphp
                                                    <li>
                                                        <a href="{{url('/product_by_cat/'.$category->id)}}">
                                                        {{$category->name}}</a>
                                                    <small>({{$catProductCount}})</small></li>
                                                    @endforeach
                                                </ul>
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul class="nice-scroll">
                                                    @foreach ($brands as $brand )
                                                    @php
                                                        $brandProductCount=\App\Models\Product::brandProductCount($brand->id);
                                                    @endphp
                                                    <li>
                                                        <a href="{{url('/product_by_brand/'.$brand->id)}}">
                                                            {{$brand->name}}</a>
                                                            <small>({{$brandProductCount}})</small>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of  {{ $totalProducts }} results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $item )
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img src="{{URL::asset('product/'.$item->image)}}" style="width: 250px;height: 200px;" alt="" class="img-fluid">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{URL::asset('img/icon/heart.png')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{URL::asset('img/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="{{url('single/'.$item->id)}}"><img src="{{URL::asset('img/icon/search.png')}}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{$item->name}}</h6>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>&#2547; {{$item->price}}</h5>
                                    <form action="{{url('addToCard')}}" method="POST">
                                        @csrf
                                        <div >
                                            <div class="quantity">
                                                <input type="hidden" name="quantity" class="form-control" value="1">
                                            </div>
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" name="addToCart" class="primary-btn  btn-block">add to cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                {{$products->onEachSide(1)->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <x-footer />