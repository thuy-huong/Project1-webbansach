@extends('layout')
@section('payment')

<main role="main">
    <div class="container mt-4">
        <?php
        $content = Cart::content();
        ?> 
        <form class="needs-validation" name="frmthanhtoan" method="post" action="{{URL::to('/order-place')}}">
            {{ csrf_field() }}
            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 order-md-2 mb-4">
                    <ul class="list-group mb-3">
                         @foreach( $content as $v_content)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <p class="my-0">{{$v_content->name}}</p>
                                <small class="text-muted">{{number_format($v_content->price , 0,',', '.')}} x {{$v_content->qty}}</small>
                            </div>
                            <span class="text-muted"> <?php 
                                $subtotal = $v_content->price *$v_content->qty;
                                echo number_format( $subtotal , 0,',', '.');
                            ?></span>
                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Thuế </span>
                            <span>{{cart::tax(0 ,',', '.')}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Phí vận chuyển</span>
                            <span>0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng thành tiền</span>
                            <strong>{{cart::total(0 ,',', '.')}}</strong>
                        </li>
                      
                    </ul>
                    <h4 class="mb-3">Hình thức thanh toán</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            
                            <label class="custom-control-label" for="httt-1" >
                                <input id="payment_option" name="payment_option" type="checkbox" class="custom-control-input" 
                                value="1">Tiền mặt
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            
                            <label class="custom-control-label" for="httt-2">
                                <input id="payment_option" name="payment_option" type="checkbox" class="custom-control-input" 
                                value="2">Chuyển khoản
                            </label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <a href="{{URL::to('/show-cart')}}" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i>&nbsp;Quay lại</a>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt
                        hàng</button>
                      
        </form>

    </div>
    <!-- End block content -->
</main>



@endsection('payment')