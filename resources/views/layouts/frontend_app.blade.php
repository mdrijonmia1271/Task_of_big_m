<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Task Project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend') }}/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    {{-- All site icons show link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
    <!-- font-awesome v4.7.0 css -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css"> --}}
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">


    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	


    {{-- Select to cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- modernizr css -->
    <script src="{{ asset('frontend') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                            <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li><a href="{{ route('login') }}"> Login </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area end -->

    @yield('frontend_content')

    <!-- start social-newsletter-section -->
    {{-- <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section> --}}
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    {{-- <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so
                                beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> domain@gmail.com</a></li>
                                <li><a href="#"><span>Tel:</span> 0131234567</a></li>
                                <li><a href="#"><span>Adress:</span> 52 Web Bangale , Adress line2 , ip:3105</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright © 2019 Tohoney All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- .footer-area end -->
    <!-- Modal area start -->
    {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{ asset('frontend') }}/images/product/product-details.jpg" alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>Pure Nature Hohey</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">$219.56</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled
                            and demoralized by the charms of pleasure of the moment, so blinded by desire denounce with
                            righteous indignation</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="1" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">Honey,</a></li>
                            <li><a href="#">Olive Oil</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Modal area start -->
    <!-- jquery latest version -->
    <script src="{{ asset('frontend') }}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{ asset('frontend') }}/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ asset('frontend') }}/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ asset('frontend') }}/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ asset('frontend') }}/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{ asset('frontend') }}/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{ asset('frontend') }}/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ asset('frontend') }}/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{ asset('frontend') }}/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{ asset('frontend') }}/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{ asset('frontend') }}/js/scripts.js"></script>
    {{-- Select to cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('vendor/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    @yield('footer_scripts')
    
</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->

</html>
