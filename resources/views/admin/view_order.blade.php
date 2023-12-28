@extends('admin_layout')
@section('viewOrder')
<div class="form-container" style="margin: 20px; border-radius: 10px ">
    <h2>Thông tin khách hàng</h2>
    <table border="1px" width="100%" cellspacing="0" cellpadding="0" >
    <thead>
        <tr>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>
    </thead>
    <tbody >
        <tr >
            <td>{{ $orderById->customer_name }}</td>
            <td>{{ $orderById->shipping_address }}</td>
            <td>{{ $orderById->customer_phone }}</td>
          
            
           
        </tr>
    </tbody>
</table>
</div>


<div class="form-container" style="margin: 20px; border-radius: 10px ">
    <table border="1px" width="100%" cellspacing="0" cellpadding="0" >
    <h2>Danh sách sản phẩm</h2>
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody >
        @foreach( $product as $key => $v_content)
        <tr >
            <td>{{ $v_content->product_name }}</td>
            <td>{{ $v_content->product_sales_quantity }}</td>
            <td>{{ $v_content->product_price }} VNĐ</td>
            <td>{{ $v_content->product_sales_quantity*$v_content->product_price }} VNĐ</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>


@endsection('viewOrder')