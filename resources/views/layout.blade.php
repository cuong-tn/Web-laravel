
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{$meta_desc}}">
	<meta name="keywords" content="$meta_keywords">
	<meta name="robots" content="index, follow">
	<link rel="canonical" href="{{$url_canonnial}}">
	<title>Web Bán Hàng</title>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/plugin.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/bundle.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
        <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
	<link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('frontend/images/ico/favicon.ico')}}">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head><!--/head-->

<body>
<div class="pos_page">
                <div class="container">
                   <!--pos page inner-->
                    <div class="pos_page_inner">
                       <!--header area -->
                        <div class="header_area">
                               <!--header top-->
                                <div class="header_top">
                                   <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                           <div class="">
                                                <ul>
                                                <li class="currency"><a href="#">Chào mừng bạn đến với chúng tôi</i></a>
                                                    </li>
                                                    <!-- <li class="languages"><a href="#"><img src="{{('frontend/images/home/logo2.jpg')}}" alt=""></a>
                                                    </li> -->

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="header_links">
                                                <ul>
												<?php
														$customer_id=Session()->get('customer_id');
														if($customer_id!=NULL)	{
														?>
														<li><a href="{{URL::to('/checkout')}}">Thanh toán</a></li>
													<?php
														}else
														{
													?>
													<li><a href="{{URL::to('/login-checkout')}}">Thanh toán</a></li>

													<?php
														}
													?>
													</a></li>
													<li><a href="{{URL::to('/giohang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
													<?php
														$customer_id=Session()->get('customer_id');
														if($customer_id!=NULL){
														?>
														<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
														<?php
														}else
														{
															?>
														<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng Nhập </a></li>
													<?php
														}
                                                        ?>
                                                         <li><a href="{{ URL::to('/admin') }}"><i class="fa fa-lock"></i> Admin </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                                <!--header top end-->

                                <!--header middel-->
                                <div class="header_middel">
                                    <div class="row align-items-center">
                                       <!--logo start-->
                                        <div class="col-lg-2 col-md-2">
                                            <div class="logo">
                                                <a href=""><img src="{{('frontend/images/home/tải xuống.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <!--logo end-->
                                        <div class="col-lg-9 col-md-9">
                                            <div class="header_right_info">
                                                <div class="search_bar">
												<form action="{{URL::to('/timkiem')}}" method="post">
													{{csrf_field()}}
													<input type="text" name="submit_keyword" placeholder="Nhập từ khóa..." type="text">
                                                        <button type="submit" value="Tìm kiếm"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                                <div class="shopping_cart">
                                                    <a href="#"><i class="fa fa-shopping-cart"></i>3 mục <i class="fa fa-angle-down"></i></a>

                                                    <!--mini cart-->
                                                    <div class="mini_cart">
                                                            @if(Session()->get('cart'))
                                                                @foreach(Session()->get('cart') as $key =>$cart)
                                                                 <div class="cart_item">
                                                                    <div class="cart_img">
                                                                        <a href="{{URL::to('/giohang')}}"><img src="{{asset('/upload/product/'.$cart['product_image'])}}" alt=""></a>
                                                                        <ul href="{{URL::to('/giohang')}}">{{$cart["product_price"]}}</ul>
                                                                    </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif


                                                       <div class="cart_button">
                                                            <a href="{{URL::to('/checkout')}}">Thanh toán</a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--header middel end-->
                            <div class="header_bottom">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="main_menu_inner">
                                                <div class="main_menu d-none d-lg-block">
                                                    <nav>
                                                        <ul>
                                                            <li class="active"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                                            </li>
                                                            <li><a href="{{URL::to('/trang-chu')}}">Shop</a>
                                                            <div class="mega_menu">
                                                                    <div class="mega_top fix">
                                                                        <div class="mega_items">
                                                                            <h3><a href="#">Danh mục</a></h3>
                                                                             @foreach($categorys as $key =>$cate)
                                                                             <ul>
                                                                                <li><a href="{{URL::to('/danh-sach-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></li>

                                                                            </ul>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="mega_items">
                                                                            <h3><a href="#">Thương hiệu</a></h3>
                                                                            @foreach($brands as $key =>$brand)
                                                                             <ul>
                                                                                <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>

                                                                            </ul>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="{{URL::to('/checkout')}}">Thanh toán</a>
                                                            </li>
                                                            <li><a href="{{URL::to('/giohang')}}">Giỏ hàng</a>
                                                            </li>
                                                            <li><a href="#">Liên hệ</a>
                                                            </li>
                                                            <li><a href="blog.html">blog</a>
                                                            </li>
                                                            <li><a href="contact.html">contact us</a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="mobile-menu d-lg-none">
                                                    <nav>
                                                        <ul>
                                                            <li><a href="{{URL::to('/trang-chu')}}">Home</a>
                                                            </li>
                                                            <li><a href="{{URL::to('/trang-chu')}}">Shop</a>
                                                                <div>
                                                                <div>
                                                                    <div class="mega_top fix">
                                                                        <div class="mega_items">
                                                                            <h3><a href="#">Danh mục</a></h3>
                                                                             @foreach($categorys as $key =>$cate)
                                                                             <ul>
                                                                                <li><a href="{{URL::to('/danh-sach-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></li>

                                                                            </ul>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="mega_items">
                                                                            <h3><a href="#">Thương hiệu</a></h3>
                                                                            @foreach($brands as $key =>$brand)
                                                                             <ul>
                                                                                <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>

                                                                            </ul>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="{{URL::to('/checkout')}}">Thanh toán</a>
                                                                <div>

                                                                </div>
                                                            </li>
                                                            <li><a href="{{URL::to('/giohang')}}">Giỏ hàng</a>
                                                                <div>
                                                                    <div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="#">pages</a>
                                                                <div>
                                                                </div>
                                                            </li>

                                                            <li><a href="#">blog</a>
                                                                <div>

                                                                </div>
                                                            </li>
                                                            <li><a href="#">contact us</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--header end -->

                        <!--pos home section-->
                        <div class=" pos_home_section">
                            <div class="row pos_home">
                                <div class="col-lg-3 col-md-8 col-12 order-md-2">
{{--                                    @foreach($banner as $key =>$banner)--}}
                                   <!--sidebar banner-->
                                        <div class="sidebar_widget banner mb-35">
                                            <div class="banner_img mb-35">
                                                <a href="#"><img src="{{('frontend/images/home/ip2.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="banner_img">
                                                <a href="#"><img src="{{('frontend/images/home/ip3.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
{{--                                    <div class="sidebar_widget banner mb-35 ">--}}
{{--                                        <div class="banner_img mb-35">--}}
{{--                                            <img src="/upload/product/{{ $banner->image }}" style="height: 176px; width: 600px;">--}}
{{--                                        </div>--}}
{{--                                        <div class="banner_img">--}}
{{--                                            <img src="/upload/product/{{ $banner->image }}" style="height: 76px; width: 478px;">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @endforeach--}}
                                    <!--sidebar banner end-->

                                    <!--categorie menu start-->
                                    <div class="sidebar_widget catrgorie mb-35">
                                        <h3>Danh mục</h3>
                                        @foreach($categorys as $key =>$cate)<ul class="list-cates">
                                            <a class="list-cate" href="{{URL::to('/danh-sach-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a>

                                        </ul>
										@endforeach
                                    </div>
                                    <!--categorie menu end-->

                                    <!--popular tags area-->
                                    <div class="sidebar_widget tags mb-35">
                                        <div class="block_title">
                                            <h3>Tìm kiếm nhiều</h3>
                                        </div>
                                        <div class="block_tags">
                                            <a href="#">Iphone</a>
                                            <a href="#">Sam sung</a>
                                            <a href="#">Oppo </a>
                                            <a href="#">Hp</a>
                                            <a href="#">Lenlovo</a>
                                            <a href="#">Mac Book</a>
                                            <a href="#">Dell</a>
                                        </div>
                                    </div>
                                    <!--popular tags end-->

                                    <!--newsletter block start-->
                                    <div class="sidebar_widget newsletter mb-35">
                                        <div class="block_title">
                                            <h3>Thông báo</h3>
                                        </div>
                                        <form action="#">
                                            <p>Đăng ký nhận thông báo của bạn</p>
                                            <input placeholder="Email" type="text">
                                            <button type="submit">Đăng ký</button>
                                        </form>
                                    </div>
                                    <!--newsletter block end-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <!--banner slider start-->
                                    <div class="banner_slider slider_1">
                                        <div class="slider_active owl-carousel">
                                            <div class="single_slider" style="background-image: url(frontend/images/home/galaxyai_f01_ft03_kv_pc_v1.avif)">
                                                <div class="slider_content">
                                                    <div class="slider_content_inner">
                                                        <h1>Thiên đường mua sắm</h1>
                                                        <p>Điện tử cao cấp, uy tín, chất lượng vận chuyển nhanh chóng!</p>
                                                        <a href="{{URL::to('/trang-chu')}}">shop now</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single_slider" style="background-image: url(frontend/images/home/hero_endframe__ov6ewwmbhiqq_large.jpg)">
                                                <div class="slider_content">
                                                    <div class="slider_content_inner">
													<h1>Giá cả phải chăng </h2>
													<p>Điện tử cao cấp, uy tín, chất lượng vận chuyển nhanh chóng! </p>
                                                        <a href="{{URL::to('/trang-chu')}}">shop now</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single_slider" style="background-image: url(frontend/images/home/baner2.webp)">
                                                <div class="slider_content">
                                                    <div class="slider_content_inner">
													<h1>Chất lượng làm nên thương hiệu </h2>
													<p>Điện tử cao cấp, uy tín, chất lượng vận chuyển nhanh chóng! </p>
                                                        <a href="{{URL::to('/trang-chu')}}">shop now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!--banner slider start-->

                                    <!--content-->
                                    <div class="featured_product">
                                        <div class="row">
											@yield('content')
                                        </div>
                                    </div>

                                    <!--content-->

                                    <!--banner area start-->
                                    <div class="banner_area mb-60">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single_banner">
                                                    <a href="#"><img src="{{('frontend/images/home/ip1 (2).jpg')}}" alt=""></a>
                                                    <div class="banner_title">
                                                        <p>Lên đến <span> 40%</span> Giảm</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single_banner">
                                                    <a href="#"><img src="{{('frontend/images/home/ip3.jpg')}}" alt=""></a>
                                                    <div class="banner_title title_2">
                                                        <p>Giảm giá <span> 30%</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    <!--pos page inner end-->
                </div>
    </div>
  <footer id="footer" style="background-color: #C3B091; color: #fff;"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
                <div class="col-sm-7">
    <div class="overlay-icon">
        <div class="col-lg-2 col-md-2" style="padding: 0;"> <!-- Thêm style="padding: 0;" để loại bỏ khoảng trắng từ viền -->
            <div class="footer-img" style="border-top: 10px solid #C3B091;"> <!-- Thêm border-top vào phần tử này -->
                <a href=""><img src="{{('frontend/images/home/tải xuống.png')}}" alt=""></a>
            </div>
        </div>
    </div>
</div>

									</div>
							</div>
						</div>
					<div class="col-sm-3">
						<!-- <div class="address">
							<img src="" alt="" />
							<p>KĐT Thanh Hà , Mậu Lương, Hà Đông , Hà Nội<</p>
						</div> -->
					</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">

						<div class="single-widget">
							<h2 style="color: #fff; font-size: 25px;">HỖ TRỢ </h2>
							<p class="f-listtel__content">
                    <span>Gọi mua:</span> <a href="tel:1900232460">1900 232 460</a>



                </p>
                <p class="f-listtel__content">
                    <span>Khiếu nại:</span> <a href="tel:18001062">1800.1062</a>

                </p>
                <p class="f-listtel__content">
                    <span>Bảo hành:</span> <a href="tel:1900232464">1900 232 464</a>

                </p>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color: #fff; font-size: 25px;"> GÓP Ý</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">0999999999</a></li>
								<li><a href="#">HAICUONG0979@GMAIL.COM</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color: #fff ; font-size: 25px">Thông tin</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Về chúng tôi</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Đối tác</a></li>
								<li><a href="#">Tuyển dụng</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color: #fff; font-size: 25px;">Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Chính sách đổi hàng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách bảo hành </a></li>
								<li><a href="#">Chính sách hoàn tiền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2 style="color: #fff; font-size: 25px;">FAQ</h2>
                            <form action="#" class="searchform">
    <div class="input-group">
        <div class="input-group-append">
            <!-- Thêm các biểu tượng phương thức thanh toán -->
            <button class="btn btn-default" type="submit">
                Thanh toán
            </button>
            <img src="{{('frontend/images/home/vida.png')}}" alt="Visa" style="width: 30px; height: auto;"> <!-- Logo Visa -->
                <img src="{{('frontend/images/home/images.jpg')}}" alt="MasterCard"style="width: 30px; height: auto;"> <!-- Logo MasterCard -->
        </div>
    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</footer><!--/Footer-->
                        <div class="copyright" style="text-align: center;">
                            <section>
                                <p>
                                    © 2018. Công ty cổ phần ASIN STORE. GPDKKD: <br>
                                    <a rel="nofollow" href="/thoa-thuan-su-dung-trang-mxh">Xem chính sách sử dụng</a>
                                </p>
                            </section>
                        </div>

        <script src="{{asset('frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('frontend/js/popper.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/js/ajax-mail.js')}}"></script>
        <script src="{{asset('frontend/js/plugins.js')}}"></script>
        <script src="{{asset('frontend/js/main.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Messenger Plugin chat Code -->
		<div id="fb-root"></div>

		<!-- Your Plugin chat code -->
		<div id="fb-customer-chat" class="fb-customerchat">
		</div>

		<!-- Messenger Plugin chat Code -->
        <div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "107148281781373");
  chatbox.setAttribute("attribution", "biz_inbox");

  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('.send_order').click(function(){

			var shipping_email =$('.shipping_email').val();
			var shipping_name=$('.shipping_name').val();
			var shipping_phone=$('.shipping_phone').val();
			var shipping_address=$('.shipping_address').val();
			var shipping_notes=$('.shipping_notes').val();
			var payment_method=$('.payment_method').val();

			var _token=$('input[name="_token"]').val();


			$.ajax({
				url:"{{url('order')}}",
				method:'post',
				data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_phone:shipping_phone,
					shipping_address:shipping_address,shipping_notes:shipping_notes,payment_method:payment_method,_token:_token},
					success:function(data){
						swal("Mua hàng thành công!");
						location.reload();
					}
			});
		});
	});
	</script>

<script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id =$(this).data('id');
                var cart_product_id =$('.cart_product_id_'+id).val();
                var cart_product_name=$('.cart_product_name_'+id).val();
                var cart_product_image=$('.cart_product_image_'+id).val();
                var cart_product_price=$('.cart_product_price_'+id).val();
                var cart_product_qty=$('.cart_product_qty_'+id).val();
                // var cart_product_size = [];
                //     $('.cart_product').each(function(){
                //             if($(this).is(":checked"))
                //             {
                //                 cart_product_size.push($(this).val());
                //             }
                //     });
                //     cart_product_size = cart_product_size.toString();
                //
                // var _token=$('input[name="_token"]').val();


                $.ajax({
                    url:"{{url('/add-cart-ajax')}}",
                    method:'post',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
                        cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_size:cart_product_size,_token:_token},
                        success:function(data){
                            swal("Đã thêm sản phẩm vào giỏ hàng!")
                        }
                });

            });
        });
        </script>
    </body>
</html>
