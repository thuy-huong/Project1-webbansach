@extends('layout')
@section('payment')

<main role="main">
    <div class="container mt-4" style="height: 400px">
       <h4 style="text-align: center;
       padding-top: 60px;">Cảm ơn bạn đã đặng hàng, chúng tôi sẽ liên hệ với bạn sớm nhất.</h4>
       <a href="{{URL::to('/san-pham')}}" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
        aria-hidden="true"></i>&nbsp;Tiếp tục mua sắm</a>
    </div>
    <!-- End block content -->
</main>



@endsection('payment')