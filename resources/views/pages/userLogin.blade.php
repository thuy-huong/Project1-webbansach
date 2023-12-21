{{-- @extends('layout')
@section('login')

<div id="wrapper">
    <form action="{{URL::to('/')}}" id="form-login" method="POST">
        <h1 class="form-heading">Đăng nhập </h1>
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

<script>
    $(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
});
</script>

@endsection('intro') --}}