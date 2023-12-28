@extends('layout')
@section('payment')

<main role="main">
    <?php
    $content = Cart::content();
    ?> 
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-4">
        <div class="py-5 text-center">
            <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
            <h2>Thanh toán</h2>
            <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4 ">
                @forEach($shipping_customer as $key =>$shipping)
                    
                      <form action="{{URL::to('/update-checkout-customer/'.$shipping->shipping_id)}}" method="post">
                     {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-10 order-md-1">
                            <h4 class="mb-3">Thông tin gửi hàng</h4>
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="kh_ten">Họ tên</label>
                                    <input type="text" class="form-control" name="shipping_name" value="{{$shipping->shipping_name}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_diachi">Địa chỉ</label>
                                    <input type="text" class="form-control" name="shipping_address" value="{{$shipping->shipping_address}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_dienthoai">Điện thoại</label>
                                    <input type="text" class="form-control" name="shipping_phone" value="{{$shipping->shipping_phone}}" >
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_email">Email</label>
                                    <input type="text" class="form-control" name="shipping_email" value="{{$shipping->shipping_email}}" >
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_email">Ghi chú</label>
                                    <textarea type="text" class="form-control" name="shipping_note" >{{$shipping->shipping_note}}</textarea>
                                </div>
                            </div>
                            @endforeach
                            <hr class="mb-4">

                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Cập nhật</button>
                              
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <form action="{{URL::to('/order-place')}}" method="post">
                    {{ csrf_field() }}  
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Giỏ hàng</span>
                        <p class="badge badge-secondary badge-pill" style="color: black"> <?php
                            $count=Cart::count();
                            echo  $count.' sản phẩm';
                        ?></p>
                    </h4>
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
                       <h4 class="mb-3">Hình thức thanh toán</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            
                            <label class="custom-control-label" for="httt-1" >
                                <input id="payment_option" name="payment_option" checked type="checkbox" class="custom-control-input" 
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
                    
                    <button class="btn btn-primary btn-lg btn-block" type="submit"  name="btnDatHang">Đặt
                        hàng</button>
                   </ul>
                </form>
            </div>
        </div>
</main>



@endsection('payment')