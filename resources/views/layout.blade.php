<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('public/front_end/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/front_end/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/pro_layout.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/layout_login_checkout.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/layout_cart.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>CÔNG TY CỔ PHẦN SÁCH ALPHA </title>
</head>
<body>
    <section class="myHeader"> 
        <div class="container py-3">
            <div class="row">
                <div class="logo col-md-2">
                    <a href="{{URL::to('/trang-chu')}}"><img src="{{('/public/front_end/images/logo.webp')}}" class="img-fluid" alt="Logo"></a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 ">
                    <form action="{{URL::to('tim-kiem')}}" method="POST">
                        <div class="input-group mb-3">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm" 
                                aria-label="Nhập từ khóa tìm kiếm" aria-describedby="basic-addon2" name="keyword_submit">
                            <button type="submit" class="input-group-text" id="basic-addon2">
                                <i class="fa-solid fa-magnifying-glass"></i></button>
                           
                        </div> 
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 ">
                    <div class="row"> 
                        <div class="col">
                            <div class="row">
                                <div class="col-3">
                                    <div class="fs-3 text-danger">
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    Tư vấn hỗ trợ</br>
                                    <strong class="text-danger">0962169464</strong>
                                </div>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-3">
                                    <div class="fs-3 text-danger">
                                        <i class="fa-regular fa-user"></i></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                   
                                    <?php
                                    $customer_id = session()->get('customer_id');
                                    $customer_name = session()->get('customer_name');
                                    if($customer_id!=NULL){
                                        echo $customer_name;
                                        echo '</br>';
                                    ?>
                                        <a href="{{URL::to('/logout-customer')}}"><strong class="text-danger">Đăng xuất</strong></a>

                                    <?php
                                     }else{
                                    ?>
                                       Xin chào!</br>
                                       <a href="{{URL::to('/login-customer')}}"><strong class="text-danger">Đăng nhập</strong></a>
                                    <?php
                                     }
                                    ?>
            
                                 
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="{{URL::to('/show-cart')}}" class="position-relative">
                        <span class="fs-2"><i class="fa-solid fa-bag-shopping"></i></span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php
                                $count=Cart::count();
                                echo  $count;
                            ?>
                        </span>
                      </a>
                </div>
            </div>
        </div>
    </section>

    <section class="myMainMenu">
            <nav class="container">
                <ul id="main-menu">
                    <li><a href="{{URL::to('/trang-chu')}}">TRANG CHỦ</a></li>
                    <li><a href="{{URL::to('/gioi-thieu')}}">GIỚI THIỆU</a></li>
                    <li><a href="{{URL::to('/san-pham')}}">TỦ SÁCH</a>
                        <ul class="sub-menu">
                            @forEach( $cate_product as $key =>$cate)
                                <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="https://hoptacxuatban.alphabooks.vn/">DỊCH VỤ HTXB</a></li>
                    <li><a href="#">TIN TỨC - SỰ KIỆN</a>
                        <ul class="sub-menu">
                            <li><a href="#">Tin tức</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Báo chí</a></li>
                                    <li><a href="#">Tin nội bộ</a></li>
                                    <li><a href="#">Tin tuyển dụng</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Sự Kiện</a></li>
                        </ul>
                    </li>
                    <li><a href="#in4">LIÊN HỆ</a></li>
                </ul>
            </nav>   
    </section>

    <section class="myMainContent  my-1">
        @yield('home')
        @yield('intro')
        @yield('login')
        @yield('pro')
        @yield('procate')
        @yield('detailsProduct')
        @yield('show_cart')
        @yield('loginCheckout')
        @yield('showCheckout')
        @yield('payment')

    </section>
    
    <section  class="myFooter  text-white py-4">
            <div class="container-fluid">
                <div class="fist-footer row">
                    <div class="col-md-4 py-3">
                            <a href="{{URL::to('/trang-chu')}}">
                                <img src="{{('/public/front_end/images/logo_footer.webp')}}" class="img-fluid" alt="logo">
                            </a>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h5 class="title-menu">Thông tin</h5>
                        <ul class="list-menu">
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i>  Giới thiệu</a></li>
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i>  Hệ thống nhà sách</a></li>
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i>  Hệ thống phát hành</a></li>
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i>  Tuyển dụng</a></li>
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i>  Hợp tác xuất bản</a></li>
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i>  Hợp tác kinh doanh</a></li>
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i>  Tích điểm đổi quà</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5 class="title-menu">Chính sách</h5>
                        <ul class="list-menu">
                            <li><a href=""><i class="fa-solid fa-angle-right"></i>  Chính sách thanh toán</a></li>
                            <li><a href=""><i class="fa-solid fa-angle-right"></i>  Chính sách vẫn chuyển</a></li>
                            <li><a href=""><i class="fa-solid fa-angle-right"></i>  Chính sách bảo mật</a></li>
                            <li><a href=""><i class="fa-solid fa-angle-right"></i>  Chính sách đổi trả hoàn tiền</a></li>
                        </ul>
                    </div>
                    <div id="in4" class="col-md-2">
                        <h5 class="title-menu">Liên hệ</h5>
                        <ul class="list-menu">
                            <li><a href=""><i class="fa-solid fa-location-dot"></i> 28A Lê Trọng Tấn, Hà Đông, Hà Nội</a></li>
                            <li><a href="">
                                <i class="fa-solid fa-phone"></i> <b> 0962169464</b>
                            </a></li>
                            <li><a href=""><i class="fa-solid fa-envelope"></i> thuyhuong@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row bg-dark text-white ">
                    <strong>© Bản quyền thuộc về Đàm Thúy Hường</strong></div>
            </div>
    </section>
   
    <script src="{{asset('public/front_end/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        //tìm tất cả li có sub-menu và thêm class has-child
        $('.sub-menu').parent('li').addClass('has-child');
    });
</script>
<script>
    //slider
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector('.aspect-ratio-169')
    const dotItem = document.querySelectorAll(".dot")
    let imgNuber = imgPosition.length
    let index = 0
    imgPosition.forEach(function(image,index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click",function(){
            slider (index)
        })           
    })
    function imgSlide (){
        index++;
        console.log(index)
        if (index>=imgNuber) {index=0}
       slider (index)
    }
    function slider(index){
        imgContainer.style.left = "-" +index*100+"%"
        const dotActive = document.querySelector('.active')
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }
    setInterval(imgSlide, 5000);

</script>
    <script type="text/javascript">
    //new_pro
        $('.autoplay').slick({
            slidesToShow: 5,
            slidesToScroll: 4,
            autoplay: true,
            autoplaySpeed: 2000,
        });
		
    
    </script>
    
</body>
</html>