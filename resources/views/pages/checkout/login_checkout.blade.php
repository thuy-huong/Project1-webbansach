@extends('layout')
@section('loginCheckout')
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="{{URL::to('/add-customer')}}" method="POST">
            {{ csrf_field() }}
            <h1>Tạo tài khoản </h1>
            <input type="text" name="customer_name" placeholder="Họ và Tên" />
            <input type="email" name="customer_email" placeholder="Email" />
            <input type="password" name="customer_password" placeholder="Mật khẩu" />
            <input type="text" name="customer_phone" placeholder="Số điện thoại" />
            <button type="submit">Đăng ký</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="#">
            <?php
            
            $message = session()->get('message');
            if($message){
                echo '<p class="text-alert"><b>'.$message.'</b></p>' ;
                session()->put('message', null);
            }
        ?> 
            <h1>Đăng nhập</h1>
            <input type="email"  placeholder="Email" />
            <input type="password" placeholder="Password" />
            {{-- <a href="#">Forgot your password?</a> --}}
            <button>Đăng nhập</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Đăng nhập</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Đăng ký</button>
            </div>
        </div>
    </div>
</div>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });
</script>
@endsection('loginCheckout')