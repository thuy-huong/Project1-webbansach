@extends('admin_layout')
@section('admin_content')

        <div class="main-top">
            <h1>Bảng điều khiển</h1>
            
        </div>
        <div class="main-skills">
            <div class="card">
                <i class="fa-solid fa-user-large"></i>
                <h3 style="color: red">Tổng số khách hàng</h3>
                <p><b>
                    <?php   
                        echo session()->get('count_customer').' khách hàng';
                    ?>    
                </b></p>
                <button><a href="{{URL::to('/list-customer')}}">Chi tiết</a></button>
            </div>
            <div class="card">
                <i class="fa-solid fa-coins"></i>
                <h3 style="color: red">Tổng sản phẩm</h3>
                <p><b> 
                    <?php   
                        echo session()->get('count_product').' sản phẩm';
                    ?>  
                </b></p>
                <button><a href="{{URL::to('/list-product')}}">Chi tiết</a></button>
            </div>
            <div class="card">
                <i class="fa-solid fa-basket-shopping"></i>
                <h3 style="color: red">Tổng số đơn hàng</h3>
                <p><b>
                    <?php   
                        echo session()->get('count_order').' đơn hàng';
                    ?> 
                </b></p>
                <button>Chi tiết</button>
            </div>
            {{-- <div class="card">
                <i class="fa-solid fa-circle-exclamation"></i>
                <h3 style="color: red">Sắp hết hàng</h3>
                <p><b>4 sản phẩm</b></p>
                <button>Chi tiết</button>
            </div> --}}
        </div>

        <section class="main-order">
            <h1>Đơn hàng mới</h1>
            <div class="order-status">
                <a href="{{URL::to('/manage-order')}}" style="margin: 5px;
                color: red;">Xem thêm</a>
                <table border="1px" width="100%" cellspacing="0" cellpadding="0" >
                    <thead style="background-color: #ccc;">
                        <tr>
                            <th>Mã đh</th>
                            <th>Người đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $new_order as $key => $n_order)
                        <tr >
                            <td>{{ $n_order->order_id }}</td>
                            <td>{{ $n_order->customer_name }}</td>
                            <td>{{ $n_order->order_total }} VNĐ</td>
                            <td>{{ $n_order->order_status }}</td>
                            <td>{{ $n_order->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        {{-- <section class="main-customer">
            <h1>Khách hàng mới</h1>
            <div class="new-customer">
                nhiều thứ!!!
                <p>???</p>
            </div>
        </setion> --}}
@endsection('admin_content')