@extends('layout')
@section('pro')

<div class="container">
    <img src="{{('public/front_end/images/collection_image.webp')}}" alt="collection_image"  class="img-fluid">
    <div class="row">
        <aside class="menu-cate col-lg-3 col-md-4 col-sm-4">
            <ul> 
                <li><b>DANH MỤC SẢN PHẨM</b></li>
                @forEach( $cate_product as $key =>$cate)
                <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                @endforeach
            </ul>
        </aside>
        <div class="main_container collection col-lg-9 col-md-12 col-sm-12">
            <div class="product-item">
                @forEach( $list_product as $key => $product)
                <div class="col-6 col-md-4 col-lg-3 ">
                        <div class="product-img">
                            <a href=""><img src="public/uploads/product/{{$product->product_image }}" width="199px" height="199px">
                        </div>
                        <div class="product-infor">
                            <div class="name">
                                <a href="" ><p>{{$product->product_name }}</p></a>
                            </div>
                            <div class="price">
                                <a href="" >{{number_format($product->product_price , 0).' '.'VNĐ'}}</a>
                            </div>
                            
                        </div>
                        <div class="add-card">
                            <a href=""> <i class="fa-solid fa-cart-shopping"></i></a>
                           
                        </div>
                </div>
                @endforeach
            </div>
           
        </div>
    </div>
</div>
@endsection('pro')