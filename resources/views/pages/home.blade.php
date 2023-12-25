@extends('layout')
@section('home')
    <div id="slider">
        <div class="aspect-ratio-169">
            <img src="{{('public/front_end/images/slider_1.webp')}}" class="img-fluid" >
            <img src="{{('public/front_end/images/slider_2.webp')}}" class="img-fluid">
            <img src="{{('public/front_end/images/slider_3.webp')}}" class="img-fluid" >
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <div class="about-title">
            <div class="container my-2">
                <div class="row">
                    <div class="col-md-6 imge">
                        <a href="">
                            <img src="{{('public/front_end/images/about_image.webp')}}" alt="about">
                        </a>
                    </div>
                    <div class="title col-md-6">
                        <div class="title-1">
                            <img src="{{('public/front_end/images/about_title.webp')}}" alt="">
                        </div>
                        <div class="title-2">Công ty Cổ phần Sách Alpha (Alpha Books)</div>
                        <div class="content">"Alpha Books được biết đến là một trong những thương hiệu hàng đầu 
                            về dòng sách quản trị kinh doanh, phát triển kỹ năng, tài chính, đầu tư… với các 
                            cuốn sách hướng dẫn khởi nghiệp, các bài học, phương pháp và kinh nghiệm quản trị 
                            của các chuyên gia, và các tập đoàn nổi tiếng trên thế giới. Sau 18 năm hình thành 
                            và phát triển, Alpha Books đã từng bước khẳng định tên tuổi của mình, đặc biệt đối 
                            với các thế hệ doanh nhân, nhà quản lý và những người trẻ luôn khát khao xây dựng 
                            sự nghiệp thành công."
                        </div>
                        <a href="{{URL::to('/gioi-thieu')}}" class="more" previewlistener="true">XEM THÊM <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <section class="new">
            <div class="container">
                <h2 class="title-module">Sách mới phát hành</h2>
                <div class="row  autoplay">
                   
                    @forEach($new_product as $key => $product)
    
                        <div class=" pro-box">
                            <div class="pro-image">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                    <img src="public/uploads/product/{{$product->product_image }}" width="200px" height="250px">
                                </a>
                            </div>
                                <div class="pro-content">
                                    <div class="pro-name"><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name }}</a></div>
                                    <div class="pro-price"><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><b>{{number_format($product->product_price , 0,',', '.').' '.'VNĐ'}}</b></a></div>
                                </div>
                        </div>
                    @endforEach
                    
                </div> 
                <div class="all-pro">
                    <a href="{{URL::to('/san-pham')}}" previewlistener="true">Xem tất cả</a>
                </div>
                
            </div>
        </section>
    
@endsection('home')
