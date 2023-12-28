@extends('admin_layout')
@section('order')
<div class="form-container" >
        <h2>Danh sách đơn hàng</h2>
        {{-- <form action="{{URL::to('/search-order')}}" method="get">
            <div>
                <label for="keyword">Tên sản phẩm </label>
                <input type="search" name="keyword" id="keyword" value="" placeholder="Nhập tên cần tìm ....">
                <input type="submit" name="btnSearch" value="Tìm kiếm">
            </div>
        </form> --}}
        <table border="1px" width="100%" cellspacing="0" cellpadding="0" >
        <?php
            
        $message = session()->get('message');
        if($message){
            echo '<span class="text-alert" color="red">'.$message.'</span>' ;
            session()->put('message', null);
        }
    ?> 

        <thead>
            <tr>
                <th>Tên người đặt</th>
                <th>Tổng giá tiền</th>
                <th>Tình trạng</th>
                <th>Xử lý</th>
                <th></th>
            </tr>
        </thead>
        <tbody >
            @foreach( $list_order as $key => $order)
            <tr >
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->order_total }} VNĐ</td>
                <td>{{ $order->order_status }}</td>
                <td>
                    <?php
                        if( $order->order_status =='Đang chờ xử lý'){

                        ?>
                        <a href="{{URL::to('/accept-order/'.$order->order_id)}}">Chấp nhận</a>
                        <?php
                        }elseif ($order->order_status=='Chờ giao hàng'){
                    ?>
                        <a href="{{URL::to('/delivery-order/'.$order->order_id)}}">Giao hàng</a>
                    <?php
                        }else{echo 'Hoàn thành';}
                    ?>
                </td>
                <td style="text-align: center; ">
                    <a href="{{URL::to('/view-order/'.$order->order_id)}}">
                       <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection('order')