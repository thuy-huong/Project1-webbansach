@extends('admin_layout')
@section('add_product')

    <div class="form-container" >
        <form id="newProductForm" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
            <h2>Thêm mới sản phẩm</h2>
            <?php
            
            $message = session()->get('message');
            if($message){
                echo '<span class="text-alert" color="red">'.$message.'</span>' ;
                session()->put('message', null);
            }
        ?> 
            {{ csrf_field() }}
            <div class="form-group">
                <label for="productName">Mã sản phẩm:</label>
                <input type="text" id="product_id" name="product_id">
            </div>
            <div class="form-group">
                <label for="productName">Tên sản phẩm:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="productName">Danh mục sản phẩm:</label>
                <select name="product_cate" id="product_cate">
                    @foreach ($cate as $key => $cate_product)
                        <option value="{{($cate_product->category_id)}}">{{($cate_product->category_name)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName">Tác Giả:</label>
                <input type="text" id="product_name"  name="product_author" ></input>
            </div>
            <div class="form-group">
                <label for="productName">Mô tả sản phẩm:</label>
                <textarea style="resize: none" rows="8" name="product_desc" ></textarea>
            </div>
            <div class="form-group">
                <label for="productName">Giá sản phẩm:</label>
                <input type="text" id="product_price" name="product_price" required>
            </div>
            <div class="form-group">
                <label for="productName">Hình ảnh sản phẩm:</label>
                <input type="file" id="product_image" name="product_image" required>
            </div>
           
            <div class="form-group">
                <label for="productName">Trạng thái:</label>
                <select name="product_status" id="product_status">
                    <option value="1" selected>Hiện</option>
                    <option value="0" >Ẩn</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Thêm mới sản phẩm</button>
            </div>
        </form>
    </div>



@endsection('add_product')