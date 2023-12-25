@extends('layout')
@section('showCheckout')

<main role="main">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-4">
        <?php
        $content = Cart::content();
        ?> 
        <form class="needs-validation" name="frmthanhtoan" method="post" action="{{URL::to('/save-checkout-customer')}}">
            {{ csrf_field() }}
            <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin gửi hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-10 order-md-1">
                    <h4 class="mb-3">Thông tin gửi hàng</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="kh_ten">Họ tên</label>
                            <input type="text" class="form-control" name="shipping_name" >
                        </div>
                        <div class="col-md-12">
                            <label for="kh_diachi">Địa chỉ</label>
                            <input type="text" class="form-control" name="shipping_address" >
                        </div>
                        <div class="col-md-12">
                            <label for="kh_dienthoai">Điện thoại</label>
                            <input type="text" class="form-control" name="shipping_phone"  >
                        </div>
                        <div class="col-md-12">
                            <label for="kh_email">Email</label>
                            <input type="text" class="form-control" name="shipping_email"  >
                        </div>
                        <div class="col-md-12">
                            <label for="kh_email">Ghi chú</label>
                            <textarea type="text" class="form-control" name="shipping_note" ></textarea>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <a href="{{URL::to('/show-cart')}}" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i>&nbsp;Quay lại</a>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Cập nhật</button>
                      
                </div>
            </div>
        </form>

    </div>
    <!-- End block content -->
</main>



@endsection('showCheckout')