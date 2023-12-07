@extends('admin_layout')
@section('add_category')


    <div class="form-container" >
        <form id="newCategoryForm">
            <h2>Thêm mới danh mục sản phẩm</h2>
            <div class="form-group">
                <label for="categoryName">Mã Danh Mục:</label>
                <input type="text" id="categoryId" name="categoryId">
            </div>
            <div class="form-group">
                <label for="categoryName">Tên Danh Mục:</label>
                <input type="text" id="categoryName" name="categoryName" required>
            </div>
            <div class="form-group">
                <label for="categoryName">Trạng thái:</label>
                <select name="trangthai" id="trangthái">
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