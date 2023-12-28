@extends('admin_layout')
@section('add_category')

    <div class="form-container" >
        <form id="newCategoryForm" action="{{URL::to('/save-category')}}" method="post">
            <h2>Thêm mới danh mục sản phẩm</h2>
            <?php
            
            $message = session()->get('message');
            if($message){
                echo '<span class="text-alert" color="red">'.$message.'</span>' ;
                session()->put('message', null);
            }
        ?> 
            {{ csrf_field() }}
            {{-- <div class="form-group">
                <label for="categoryName">Mã Danh Mục:</label>
                <input type="text" id="category_id" name="category_id">
            </div> --}}
            <div class="form-group">
                <label for="categoryName">Tên Danh Mục:</label>
                <input type="text" id="category_name" name="category_name" required>
            </div>
            <div class="form-group">
                <label for="categoryName">Trạng thái:</label>
                <select name="category_status" id="category_status">
                    <option value="1" selected>Hiện</option>
                    <option value="0" >Ẩn</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Thêm Mới</button>
            </div>
        </form>
    </div>



@endsection('add_category')