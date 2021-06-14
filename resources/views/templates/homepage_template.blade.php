@extends('layouts.customer.app')
@section('styles')
<style type="text/css">
    #login-footer{
        display: none;
    }
</style>
@endsection
@section('content')
	@webapp_banner('banners', 16)
    <div id="banner" class="home-banner">
        <div class="home-banner-text">
            <p>{!! $banners[0]->editor !!}</p>
        </div>
        <div class="home-banner-overlay"></div>
        <div class="home-banner-slider">
            @foreach( $banners as $banner )
                <div class="slider-banner">
                    <img src="public/uploads/{{ $banner->file }}"alt="Image">
                </div>
            @endforeach
        </div>
    </div>

    <div id="main" class="main">
        <div class="container">
            <div class="content">
            	@yield('page_content') 
            </div>
        </div>
    </div><!--end main-->
    
    <div class="chassis-login">
        <div class="chassis-login-bg-top">
            <div class="chassis-login-bg-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="car-logo">
                                <ul>
                                    <li><a href="#"><img src="public/customer/images/img-car-logo1.png" alt="Image"></a></li>
                                    <li><a href="#"><img src="public/customer/images/img-car-logo2.png" alt="Image"></a></li>
                                    <li><a href="#"><img src="public/customer/images/img-car-logo3.png" alt="Image"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="chassis-login-content">
                                <p>Chassis pool deal login</p>
                                <a href="#" class="btn-blue">Log in now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="part-module">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="part-module-box">
                      <img src="public/customer/images/img-part-module1.jpg" alt="Image">
                      <div class="part-module-overlay"></div>
                      <div class="part-module-text">
                            <span>Parts &amp; Accessories</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="part-module-box">
                      <img src="public/customer/images/img-part-module2.jpg" alt="Image">
                      <div class="part-module-overlay"></div>
                      <div class="part-module-text">
                            <span>New Equipment</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="part-module-box">
                      <img src="public/customer/images/img-part-module3.jpg" alt="Image">
                      <div class="part-module-overlay"></div>
                      <div class="part-module-text">
                            <span>Used Vehicles</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="part-module-box">
                      <img src="public/customer/images/img-part-module4.jpg" alt="Image">
                      <div class="part-module-overlay"></div>
                      <div class="part-module-text">
                            <span>Service</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
        
    <div class="get-in-touch">
        <div class="bg-top">
            <div class="bg-bot">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="get-in-touch-content">
                                <h2>SERVING SC, NC, AND GA</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci did unt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                                <ul>
                                    <li>Duis aute irure dolor in reprehenderit in voluptate velit</li>
                                    <li>Esse cillum dolore eu fugiat nulla pariatur.</li>
                                    <li>Except eur sint occaecat cupidatat non proident</li>
                                    <li>Sunt in culpa qui officia deserunt mollit.</li>
                                </ul>

                                <div class="get-in-touch-button">
                                    <a href="#" class="btn-blue">Get in touch</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="get-in-touch-map">
                                <a href="#"><img src="public/customer/images/img-home-map.jpg" alt="Image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection