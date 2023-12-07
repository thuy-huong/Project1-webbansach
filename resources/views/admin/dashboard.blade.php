@extends('admin_layout')
@section('admin_content')

        <div class="main-top">
            <h1>Bảng điều khiển</h1>
            
        </div>
        <div class="main-skills">
            <div class="card">
                <i class="fa-solid fa-user-large"></i>
                <h3 style="color: red">Tổng số khách hàng</h3>
                <p><b>500 khách hàng</b></p>
                <button>Chi tiết</button>
            </div>
            <div class="card">
                <i class="fa-solid fa-coins"></i>
                <h3 style="color: red">Tổng sản phẩm</h3>
                <p><b>1234 sản phẩm</b></p>
                <button>Chi tiết</button>
            </div>
            <div class="card">
                <i class="fa-solid fa-basket-shopping"></i>
                <h3 style="color: red">Tổng số đơn hàng</h3>
                <p><b>3455 Đơn hàng</b></p>
                <button>Chi tiết</button>
            </div>
            <div class="card">
                <i class="fa-solid fa-circle-exclamation"></i>
                <h3 style="color: red">Sắp hết hàng</h3>
                <p><b>4 sản phẩm</b></p>
                <button>Chi tiết</button>
            </div>
        </div>
        <section class="main-order">
            <h1>Tình trạng đơn hàng</h1>
            <div class="order-status">
                nhiều thứ!!!
                <p>???</p>
            </div>
        </section>

        <section class="main-customer">
            <h1>Khách hàng mới</h1>
            <div class="new-customer">
                nhiều thứ!!!
                <p>???</p>
            </div>
        </setion>
@endsection('admin_content')