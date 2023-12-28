@extends('layout')
@section('customer_infor')
       
<main role="main">
    <div class="container mt-4">
        <div class="py-5 text-center"> 
            <h2>Thông tin của bạn</h2>
           
        </div>
      
        <div class="card">
            <?php
            
            $message = session()->get('message');
            if($message){
                echo '<p style="color: red;font-size: 20px;">'.$message.'</span>' ;
                session()->put('message', null);
            }
        ?> 
            <div>
                <!-- Tab items -->
                <div class="tabs" style="    margin-left: 100px; ">
                    <div class="tab-item active">Thông tin </div>
                    <div class="tab-item ">Đổi mật khẩu</div>
                    <div class="tab-item">Sản phẩm bạn đã đặt</div>
                    <div class="line" "></div>
                </div>
                   
            <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            
                            <div class="col-md-8 order-md-1" style="margin:0 17%;">
                                @foreach($customer_infor as $key =>$in4_c)
                                <form action="{{URL::to('/update-customer/'.$in4_c->customer_id)}}" method="post">
                                   {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="kh_ten">Họ tên</label>
                                            <input type="text" class="form-control" name="customer_name_new" value="{{$in4_c->customer_name}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="kh_diachi" >Email</label>
                                            <input type="text" class="form-control" readonly name="shipping_address" value="{{$in4_c->customer_email}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="kh_dienthoai">Điện thoại</label>
                                            <input type="text" class="form-control" name="customer_phone_new" value="{{$in4_c->customer_phone}}">
                                        </div>
                                        <button class="btn btn-primary btn-lg btn-block" style="width: 30%;margin: 20px">Cập nhật</button>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                           
                        </div>
                    </div>
                    <div class="tab-pane"> 
                        <div class="col-md-8 order-md-1" style="margin:0 17%;">
                            @foreach($customer_infor as $key =>$in4_c) 
                            <form action="{{URL::to('/update-password/'.$in4_c->customer_id)}}" method="POST">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <label for="kh_ten">Nhập mật khẩu của bạn</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_ten">Nhập mật khẩu mới</label>
                                    <input type="password" class="form-control" name="password_new">
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" style="width: 30%;margin: 20px">Cập nhật</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <div class="tab-pane"> 
                        <ul class="list-group mb-3">
                           @foreach($list_order as $key => $v_content)
                           <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <div>
                                   <p class="my-0">{{$v_content->product_name}}</p>
                                   <small class="text-muted">{{number_format($v_content->product_price , 0,',', '.')}} x {{$v_content->product_sales_quantity}}</small>
                               </div>
                               <span class="text-muted">
                                    <?php 
                                        $subtotal = $v_content->product_price *$v_content->product_sales_quantity;
                                        echo number_format( $subtotal , 0,',', '.');
                                    ?> 
                                </span>
                           </li>
                          @endforeach

                    </div>
                    
                </div>
            </div>
        </div>
       
    </div>
</main>
<script>
    const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabs = $$(".tab-item");
const panes = $$(".tab-pane");

const tabActive = $(".tab-item.active");
const line = $(".tabs .line");

requestIdleCallback(function () {
line.style.left = tabActive.offsetLeft + "px";
line.style.width = tabActive.offsetWidth + "px";
});

tabs.forEach((tab, index) => {
const pane = panes[index];

tab.onclick = function () {
$(".tab-item.active").classList.remove("active");
$(".tab-pane.active").classList.remove("active");

line.style.left = this.offsetLeft + "px";
line.style.width = this.offsetWidth + "px";

this.classList.add("active");
pane.classList.add("active");
};
});

</script>


@endsection('customer_infor')