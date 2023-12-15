@extends('admin_layout')
@section('edit_category')

    <div class="form-container" >
        @foreach($edit_category as $key => $edit_value)
        <form id="newCategoryForm" action="{{URL::to('/update-category/'.$edit_value->category_id)}}" method="post">
            <h2>Chỉnh sửa danh mục sản phẩm</h2>
            
            {{ csrf_field() }}
            <tr>
            <div class="form-group">
                <label for="categoryName">Mã Danh Mục:</label>
                <input type="text" id="category_id" name="category_id" readonly value="{{$edit_value->category_id}}">
            </div>
            <div class="form-group">
                <label for="categoryName">Tên Danh Mục:</label>
                <input type="text" id="category_name" name="category_name" required value="{{$edit_value->category_name}}">
            </div>
            <div class="form-group">
                <label for="categoryName">Trạng thái:</label>
                <select name="category_status" id="category_status">
                    <option value="1" <?php if ($edit_value->category_status==1){echo "selected";}?> >Hiện</option>
                    <option value="0" <?php if ($edit_value->category_status==0){echo "selected";}?> >Ẩn</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Cập nhật</button>
            </div>
            @endforeach
        </form>
    </div>



@endsection('edit_category')