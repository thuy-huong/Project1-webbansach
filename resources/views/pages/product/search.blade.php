@extends('layout')
@section('pro')

<div class="container">
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    <div class="row">
            <div class="product-item">
                @forEach( $search_product as $key => $product)
                <div class="col-6 col-md-4 col-lg-3 ">
                        <div class="product-img">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                <img src="public/uploads/product/{{$product->product_image }}" width="199px" height="199px">
                            </a>
                        </div>
                        <div class="product-infor">
                            <div class="name">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" >
                                    <p>{{$product->product_name }}</p>
                                </a>
                            </div>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="price">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" >{{number_format($product->product_price , 0).' '.'VNĐ'}}</a>
                            </div>   
                        </div>
                </div>
                @endforeach
            </div>
    </div>
</div>
@endsection('pro')