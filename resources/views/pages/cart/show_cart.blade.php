@extends('layout')
@section('show_cart')

<h1 class="text-center">Giỏ hàng</h1>
<div class="row">
    <div class="col col-md-12">
        <table class="table table-bordered">
            <thead>
              
                    <th>STT</th>
                    <th>Ảnh đại diện</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="datarow">
                <tr>
                    <td>1</td>
                    <td>
                        <img src="../assets/img/product/ipad4.png" class="hinhdaidien">
                    </td>
                    <td>Apple Ipad 4 Wifi 16GB</td>
                    <td class="text-right">2</td>
                    <td class="text-right">11,800,000.00</td>
                    <td class="text-right">23,600,000</td>
                    <td>
                        <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                        <a id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham">
                            <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="{{URL::to('/san-pham')}}" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                aria-hidden="true"></i>&nbsp;Tiếp tục mua sắm</a>
        <a href="{{URL::to('/login-checkout')}}" class="btn btn-primary btn-md"><i
                class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán</a>
    </div>
</div>
</div>


@endsection('show_cart') 