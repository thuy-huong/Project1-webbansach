@extends('admin_layout')
@section('list_customer')
<div class="form-container" >
        <h2>Danh sách khách hàng</h2>
        <form action="{{URL::to('/search-customer')}}" method="get">
            <div>
                <label for="keyword">Tên khách hàng </label>
                <input type="search" name="keyword" id="keyword" value="" placeholder="Nhập tên cần tìm ....">
                <input type="submit" name="btnSearch" value="Tìm kiếm">
            </div>
        </form>
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
                <th>Mã kh</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>       
                <th>Thời gian</th>       
                <th>Chức năng</th>    
            </tr>
        </thead>
        <tbody>
            @foreach( $list_customer as $key => $customer)
            <tr >
                <td>{{ $customer->customer_id }}</td>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->customer_email }}</td>
                <td>{{ $customer->customer_phone }}</td>
                <td style="text-align: center">
                    <?php
                        if($customer->customer_status==0){
                    ?>
                            <a href="{{URL::to('/lock-open-customer/'.$customer->customer_id)}}"><i class="fa-solid fa-lock" style="color: red;"></i></a>
                    <?php
                        }else{
                    ?>
                            <a href="{{URL::to('/lock-customer/'.$customer->customer_id)}}"><i class="fa-solid fa-lock-open" style="color: blue;"></i></a>
                    <?php
                        }
                            
                    ?>

                </td>
                <td>{{ $customer->created_at }}</td>
                <td style="text-align: center; ">
                    <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/delete-customer/'.$customer->customer_id)}}">
                        <i class="fa-solid fa-trash" style="color: red;"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection('list_customer')