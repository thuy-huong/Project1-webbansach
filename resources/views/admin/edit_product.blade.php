@extends('admin_layout')
@section('edit_product')

    <div class="form-container" >

        @foreach($edit_product as $key => $edit_value)
        <form id="newCategoryForm" action="{{URL::to('/update-product/'.$edit_value->product_id)}}" method="post">
            <h2>Chỉnh sửa sản phẩm</h2>
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="productName">Mã sản phẩm:</label>
                    <input type="text" id="product_id" name="product_id" readonly value="{{$edit_value->product_id}}">
                </div>
                <div class="form-group">
                    <label for="productName">Tên sản phẩm:</label>
                    <input type="text" id="product_name" name="product_name" required value="{{$edit_value->product_name}}">
                </div>
                <div class="form-group">
                    <label for="productName">Danh mục sản phẩm:</label>
                    <select name="product_cate" id="product_cate">
                        @foreach ($product_cate as $key => $cate_product)
                            @if($cate_product->category_id==$edit_value->product_cate)
                            <option value="{{($cate_product->category_id)}}" selected>{{($cate_product->category_name)}}</option>
                            @else
                            <option value="{{($cate_product->category_id)}}">{{($cate_product->category_name)}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="productName">Tác giả</label>
                    <input type="text" id="product_author" name="product_author" required value="{{$edit_value->product_author}}">
                </div>
                <div class="form-group">
                    <label for="productName">Mô tả sản phẩm:</label>
                    <textarea style="resize: none" rows="8" name="product_desc" >{{$edit_value->product_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="productName">Giá sản phẩm:</label>
                    <input type="text" id="product_price" name="product_price" value="{{$edit_value->product_price}}">
                </div>
                <div class="form-group">
                    <label for="productName">Hình ảnh sản phẩm:</label>
                    <input type="file" id="product_image" name="product_image"  >
                    <img src="{{URL::to('/public/uploads/product/'.$edit_value->product_image)}}" alt="" height="150px" width="200px">
                </div>
               
                <div class="form-group">
                    <label for="productName">Trạng thái:</label>
                    <select name="product_status" id="product_status">
                        <option value="1" <?php if ($edit_value->product_status==1){echo "selected";}?> >Hiện</option>
                        <option value="0" <?php if ($edit_value->product_status==0){echo "selected";}?> >Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Cập nhật sản phẩm</button>
                </div>
        </form>
        @endforeach
    </div>



@endsection('edit_product')