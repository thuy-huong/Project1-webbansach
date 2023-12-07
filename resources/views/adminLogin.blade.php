<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/back_end/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('public/back_end/css/layout_login.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Trang quản lý admin</title>
</head>

<body>
    <div id="wrapper">
        <form action="{{URL::to('/admin_dashboard')}}" id="form-login" method="POST">
            <h1 class="form-heading">Đăng nhập admin</h1>
            <?php
            
            $message = session()->get('message');
            if($message){
                echo '<span class="text-alert" color="red">'.$message.'</span>' ;
                session()->put('message', null);
            }
        ?> 
            {{ csrf_field() }}
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="admin_email" placeholder="Tên đăng nhập" value="thuyhuong31804@gmail.com">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="admin_password" placeholder="Mật khẩu" value="thuyhuong">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('public/back_end/js/app.js')}}"></script>
</html>