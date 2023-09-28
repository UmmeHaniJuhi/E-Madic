<x-header/>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            <p>{{ session()->get('success') }}</p>
                        </div>
                        @endif
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total=0;
                                @endphp
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{url::asset('product/'.$item->image)}}" width="100px" alt="" class="img-fluid">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$item->name}}</h6>
                                            <h5>&#2547; {{$item->price}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <form action="{{url('updateCart')}}" method="POST">
                                            @csrf
                                            <div class="quantity">
                                                <input type="number" class="form-control" min="1" max="{{$item->pQua}}" value="{{$item->quantity}}" name="quantity">
                                            </div>
                                            <input type="hidden" value="{{$item->id}}" name="id">
                                            <input type="submit" value="update" class="btn btn-success"  name="update">
                                        </form>
                                    </td>
                                    <td class="cart__price">&#2547; {{$item->price * $item->quantity}}</td>
                                    <td class="cart__close"><a href="{{url('deleteCartItem/'.$item->id)}}"><i class="fa fa-close"></i></a></td>
                                </tr>
                                @php
                                    $total+=($item->price * $item->quantity);
                                @endphp
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{url('/shop')}}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>&#2547; {{$total}}</span></li>
                            <li>Total <span>&#2547; {{$total}}</span></li>
                        </ul>
                        <form id="checkoutForm" action="{{ url('checkout') }}" method="POST">
                            @csrf 
                            <input type="text" name="fullname" class="form-control mt-2" placeholder="Enter Full Name" required>
                            <input type="text" name="phone" class="form-control mt-2" placeholder="Enter Phone" required>
                            <input type="text" name="address" class="form-control mt-2" placeholder="Enter Address" required>
                            <input type="hidden" name="bill" class="form-control mt-2" value="{{ $total }}" required>
                        
                            <label for="payment_method" class="mt-3">Select Payment Method:</label>
                            <div class="form-check">
                                <input type="radio" name="payment_method" class="form-check-input" value="delivery" checked>
                                <label class="form-check-label" for="payment_method">Payment on Delivery</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="payment_method" class="form-check-input" value="online">
                                <label class="form-check-label" for="payment_method">Online Payment</label>
                            </div>
                        
                            <input type="submit" name="checkout" class="primary-btn mt-3 btn-block" value="Proceed to checkout">
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
 
    <x-footer/>