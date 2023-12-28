@extends('layout')
@section('show_cart')

<h1 class="text-center">Giỏ hàng</h1>
<div class="row">
    <div class="col col-md-12">
        <?php
        $content = Cart::content();
        ?> 
        <table class="table table-bordered">
            <thead>
                    <th>Ảnh đại diện</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="datarow">
                @foreach( $content as $v_content)
                <tr>
                    <td>
                            <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50px" ></a>
                    </td>
                    <td>{{$v_content->name}}</td>
                    <td class="text-right">{{number_format($v_content->price , 0,',', '.').' '.'VNĐ'}}</td>
                    <td class="text-right">
                        <form action="{{URL::to('/update-cart-qty')}}" method="post">
                            {{ csrf_field() }}
                            <input type="number" name="cart_quantity" min="1" value="{{$v_content->qty}}" class="btn btn-defaul btn-sm">
                            <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" value="form-control">
                            <button type="submit" name="update_qty"  id="update_qty" class="btn btn-defaul btn-sm">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>
                    </td>
                    
                    <td class="text-right">
                        <?php 
                            $subtotal = $v_content->price *$v_content->qty;
                            echo number_format( $subtotal , 0,',', '.').' '.'VNĐ';
                        ?>
                    </td>
                    <td>
                        <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                        <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}" id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham">
                            <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
					<ul>
						<li>Tổng tiền <span>{{cart::priceTotal(0, ',', '.').' '.'VNĐ'}}</span></li>
						<li>Thuế <span>{{cart::tax(0 ,',', '.').' '.'VNĐ'}}</span></li>
						<li>Phí vận chuyển <span>Free</span></li>
						<li>Thành tiền <span>{{cart::total(0 ,',', '.').' '.'VNĐ'}}</span></li>
					</ul>
						{{-- <a class="btn btn-default update" href="">Update</a>
						<a class="btn btn-default check_out" href="">Check Out</a> --}}
				</div>
			</div>
            <div class="col-sm-6">
                <div class="pay">
                    <a href="{{URL::to('/san-pham')}}" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i>&nbsp;Tiếp tục mua sắm</a>
                        <?php
                            $customer_id = session()->get('customer_id');
                            $shipping_id = session()->get('shipping_id');
                            
                            if($customer_id!=null&&$shipping_id!=null){
                        ?>
                            <a href="{{URL::to('/payment')}}" class="btn btn-primary btn-md">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán
                            </a>
                        <?php
                            }elseif ($customer_id!=null&&$shipping_id==null) {
                        ?>
                             <a href="{{URL::to('/checkout')}}" class="btn btn-primary btn-md">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán
                            </a>
                        <?php
                            }else {
                        ?>
                             <a href="{{URL::to('/login-customer')}}" class="btn btn-primary btn-md">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán
                            </a>
                        <?php
                            }
                        ?>
                            
                           
                </div>
            </div>
        </div>
    
</div>
</div>


@endsection('show_cart') 