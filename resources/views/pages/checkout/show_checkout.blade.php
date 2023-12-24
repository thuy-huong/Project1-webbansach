@extends('layout')
@section('showCheckout')

<main role="main">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-4">
        <form class="needs-validation" name="frmthanhtoan" method="post" action="/save-checkout-customer">
            {{ csrf_field() }}
            <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Giỏ hàng</span>
                        <span class="badge badge-secondary badge-pill">2</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <input type="hidden" name="sanphamgiohang[1][sp_ma]" value="2">
                        <input type="hidden" name="sanphamgiohang[1][gia]" value="11800000.00">
                        <input type="hidden" name="sanphamgiohang[1][soluong]" value="2">

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Apple Ipad 4 Wifi 16GB</h6>
                                <small class="text-muted">11800000.00 x 2</small>
                            </div>
                            <span class="text-muted">23600000</span>
                        </li>
                        <input type="hidden" name="sanphamgiohang[2][sp_ma]" value="4">
                        <input type="hidden" name="sanphamgiohang[2][gia]" value="14990000.00">
                        <input type="hidden" name="sanphamgiohang[2][soluong]" value="8">

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Apple iPhone 5 16GB White</h6>
                                <small class="text-muted">14990000.00 x 8</small>
                            </div>
                            <span class="text-muted">119920000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng thành tiền</span>
                            <strong>143520000</strong>
                        </li>
                    </ul>


                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Xác nhận</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Thông tin khách hàng</h4>

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

                    <h4 class="mb-3">Hình thức thanh toán</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required=""
                                value="1" checked>
                            <label class="custom-control-label" for="httt-1" >Tiền mặt</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required=""
                                value="2">
                            <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required=""
                                value="3">
                            <label class="custom-control-label" for="httt-3">Ship COD</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt
                        hàng</button>
                </div>
            </div>
        </form>

    </div>
    <!-- End block content -->
</main>



@endsection('showCheckout')