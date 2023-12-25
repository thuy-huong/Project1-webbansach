@extends('layout')
@section('detailsProduct')

    <main role="main">
        @forEach($details_product as $key => $details_pro)
        <div class="container mt-4">
            <div class="card">
                
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="{{URL::to('/save-cart')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id_hidden" id="product_id_hidden" value="{{$details_pro->product_id}}">
                        <input type="hidden" name="product_name_hidden" id="product_name_hidden" value="{{$details_pro->product_name }}">
                        <input type="hidden" name="product_price_hidden" id="product_price_hidden" value="{{$details_pro->product_price }}">

                        <div class="wrapper row">
                            <div class=" col-md-6">
                                <div class="product-image-details">
                                    <img src="/public/uploads/product/{{$details_pro->product_image }}" alt="" height="490px" width="490px">
                                </div>
                                
                            </div>
                           
                            <div class="details col-md-6">
                                <h3 class="product-title">{{$details_pro->product_name }}</h3>
                                <p class="product-description">Mã sách:{{$details_pro->product_id}} </p>
                                <p class="product-description">Tác giả:{{$details_pro->product_author}} </p>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>

                                <p></p><small class="text-muted">Giá cũ: <s><span></span></span></s></small>
                                <p></p><h4 class="price">Giá hiện tại: <span>{{number_format($details_pro->product_price , 0,',', '.').' '.'VNĐ'}}</span></h4>
                                <table >
                                    <tbody>
                                        <tr>
                                            <td>Danh mục: </td>
                                            <td><b>{{$details_pro->category_name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Số Lượng còn lại:</td>
                                            <td><b>Còn hàng</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <label for="qty">Số lượng đặt mua:</label>
                                    <input type="number" min="1" class="form-control" id="product_qty" name="product_qty" value="1" style="margin-bottom: 30px; width: 30%; ">
                                </div>
                                <div class="action">
                                    <button type="submit" class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Thêm vào giỏi hàng</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div>
                    <!-- Tab items -->
                    <div class="tabs">
                        <div class="tab-item active">CHI TIẾT</div>
                        <div class="tab-item">REVIEW ĐỘC GIẢ</div>
                        <div class="tab-item">REVIEW ĐỘC GIẢ</div>
                        <div class="tab-item">ĐÁNH GIÁ TỪ CHUYÊN GIA</div>
                        <div class="tab-item">BÁO CHÍ NÓI GÌ VỀ CUỐN SÁCH</div>
                        <div class="line"></div>
                    </div>
                <div class="tab-content">
                        <div class="tab-pane active">
                            <h2>Thông tin chi tiết sản phẩm</h2>
                            <p>{{$details_pro->product_desc }}</p>
                        </div>
                        <div class="tab-pane">  
                            <p>Nội dung đang được cập nhật...</p>
                        </div>
                        <div class="tab-pane">
                            
                            <p>Nội dung đang được cập nhật...</p>
                        </div>
                        <div class="tab-pane">
                            
                            <p>Nội dung đang được cập nhật...</p>
                        </div>
                        <div class="tab-pane">
                            
                            <p>Nội dung đang được cập nhật...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforEach
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

    @endsection('detailsProduct')