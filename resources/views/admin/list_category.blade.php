@extends('admin_layout')
@section('list_category')
<div class="form-container" >
    <table border="1px" width="100%" cellspacing="0" cellpadding="0" >
        <h2>Danh sách danh mục sản phẩm</h2>
        <?php
            
        $message = session()->get('message');
        if($message){
            echo '<span class="text-alert" color="red">'.$message.'</span>' ;
            session()->put('message', null);
        }
    ?> 

        <thead>
            <tr>
                <th>Mã DM</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>       
                <th>Chức năng</th>    
            </tr>
        </thead>
        <tbody>
            @foreach($list_category as $key => $cate_pro)
            <tr>
                <td>{{ $cate_pro->category_id }}</td>
                <td>{{ $cate_pro->category_name }}</td>
                <td>
                    <?php
                        if($cate_pro->category_status==0){
                            echo 'Ẩn';
                        }else{
                            echo 'Hiển thị';
                        }
                            
                    ?>

                </td>
                <td>
                    <a href="{{URL::to('/edit-category/'.$cate_pro->category_id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/delete-category/'.$cate_pro->category_id)}}">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection('list_category')