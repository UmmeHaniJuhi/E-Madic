<x-header />
@if (session()->has('error'))
<div class="alert alert-danger">
    <p>{{ session()->get('error') }}</p>
</div>
@endif
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{URL::asset('img/banner/banner.jpg')}}" height="300px" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{URL::asset('img/banner/banner1.jpg')}}" height="300px" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{URL::asset('img/banner/banner2.jpg')}}" height="300px" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
          @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                @endif
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".sale">Sales</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($allproducts as $item )
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix {{$item->type}}">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="">
                          <img src="{{URL::asset('product/'.$item->image)}}" style="width: 250px;height: 200px;" alt="" class="img-fluid">
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
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{URL::asset('img/banner/banner3.jpg')}}" height="300px" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{URL::asset('img/banner/banner4.jpg')}}" height="300px" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{URL::asset('img/banner/banner5.jpg')}}" height="300px" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </section>
    <!-- Categories Section End -->



<x-footer />