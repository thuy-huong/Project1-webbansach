@extends('admin_layout')
@section('list_category')
<div class="form-container" >
        <h2>Danh sách sản phẩm</h2>
        <form action="{{URL::to('/search-product')}}" method="get">
            <div>
                <label for="keyword">Tên sản phẩm </label>
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
                <th>Mã SP</th>
                <th>Tên sản phẩm</th>
                <th>Tác giả</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>       
                <th>Chức năng</th>    
            </tr>
        </thead>
        <tbody>
            @foreach( $list_product as $key => $product)
            <tr>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_author}}</td>
                <td>{{ $product->product_price }}</td>
                <td><img src="public/uploads/product/{{ $product->product_image }}" height="150px" width="200px"></td>
                <td>{{ $product->category_name }}</td>
                <td>
                    <?php
                        if($product->product_status==0){
                            echo 'Ẩn';
                        }else{
                            echo 'Hiển thị';
                        }
                            
                    ?>

                </td>
                <td>
                    <a href="{{URL::to('/edit-product/'.$product->product_id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/delete-product/'.$product->product_id)}}">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection('list_category')