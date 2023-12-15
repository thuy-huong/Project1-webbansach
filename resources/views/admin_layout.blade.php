<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('public/back_end/css/layout_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('public/back_end/css/layout_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('public/back_end/css/layout_catelogy.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{URL::to('/dashboard')}}" class="logo">
                    <img src="{{('public/back_end/images/logog.webp')}}" alt="logo">
                    <span class="nav-item">
                        <?php
                        $admin_name = session()->get('admin_name');
                        if($admin_name){
                            echo $admin_name ;
                        }
                        ?> 
                    </span>    
                </a></li>
                <li><a href=""{{URL::to('/dashboard')}}"">
                    <i class="fa-solid fa-gauge"></i>
                    <span class="nav-item">Bảng điều khiển</span>  
                </a></li>
                <li><a href="">
                    <i class="fa-solid fa-user"></i> 
                    <span class="nav-item">Quản lý Khách hàng</span> 
                </a>
                    <ul>
                        <li class="submenu2"><a href="">Danh sách khách hàng</a></li>
                        <li class="submenu2"><a href="">Thêm khách hàng</a></li>
                    </ul>
                </li>
                <li><a href="">
                    <i class="fa-solid fa-list"></i> 
                    <span class="nav-item">Quản lý danh mục</span> 
                </a>
                    <ul>
                        <li class="submenu2"><a href="{{URL::to('/list-category')}}">Danh sách danh mục</a></li>
                        <li class="submenu2"><a href="{{URL::to('/add-category')}}">Thêm danh mục</a></li>
                    </ul>
                </li>
                <li><a href="">
                    <i class="fa-solid fa-tag"></i>  
                    <span class="nav-item">Quản lý sản phẩm</span>     
                </a>
                    <ul>
                            <li class="submenu2"><a href="">Danh sách sản phẩm</a></li>
                            <li class="submenu2"><a href="">Thêm sản phẩm</a></li>
                        </ul>
                </li>
                <li><a href="">
                    <i class="fa-solid fa-dolly"></i>  
                    <span class="nav-item">Quản lý đơn hàng</span>     
                </a></li>
                <li><a href="">
                    <i class="fa-solid fa-gear"></i>  
                    <span class="nav-item">Cài đặt</span>     
                </a></li>
                <li><a href="">
                    <i class="fa-solid fa-circle-question"></i> 
                    <span class="nav-item">Trợ giúp </span>     
                </a></li>
                <li><a href="{{URL::to('/logout')}}" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>  
                    <span class="nav-item">Đăng xuất</span>     
                </a></li>
            </ul>
        </nav>
        <setion class="main">
            @yield('admin_content')
            @yield('add_category')
            @yield('list_category')
            @yield('edit_category')

            
        </setion>
    </div>
</body>
</html>