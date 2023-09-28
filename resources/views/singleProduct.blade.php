<x-header/>
    <!-- Header Section End -->

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('/shop')}}">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
        </div>

                     

        <div class="product__details">
            <div class="container">
                @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                @endif
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <div class="product__details__pic">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{URL::asset('product/'.$product->image )}}" alt="">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="product__details__content">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <div class="product__details__text">
                                        <h4>{{$product->name}}</h4>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span> - 5 Reviews</span>
                                        </div>
                                        <h3>&#2547;{{$product->price}}</h3>
                                        <p>{{$product->description}}</p>
                                        <form action="{{url('addToCard')}}" method="POST">
                                            @csrf
                                            <div class="product__details__cart__option justify-content-center">
                                                <div class="quantity">
                                                    
                                                        <input type="number" name="quantity" class="form-control" min="1" max="{{$product->quantity}}" value="1">
                                                </div>
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <button type="submit" name="addToCart" class="primary-btn">add to cart</button>
                                            </div>
                                        </form>
                
                                        <div class="product__details__last__option">
                                            <ul>
                                             
                                                <li><span>Category : </span> {{$product->category->name}} </li>
                                                <li><span>Sub-Category : </span> {{$product->subcategory->name}} </li>
                                                <li><span>Brand : </span> {{$product->brand->name}} </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
               
            </div>
        </div>
        
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($related as $item )
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 ">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{URL::asset('product/'.$item->image)}}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{URL::asset('img/icon/heart.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{URL::asset('img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
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
        </div>
    </section>
    <!-- Related Section End -->

    <!-- Footer Section Begin -->
    <x-footer/>