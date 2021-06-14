@extends('layouts.customer.app')
@section('content')
	<div id="banner" class="inner-banner">
              <img src="public/customer/images/img-inner-banner.jpg" alt="Image">
              <div class="ib-overlay left-overlay"></div>
              <div class="ib-overlay right-overlay"></div>
            </div>

            <div id="main" class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumbs">
                               <ul>
                                   <li><a href="#">Home</a></li>
                                   <li><a href="#">Parts &amp; Accessories</a></li>
                               </ul>
                            </div>

                            <div class="content">
                                <h1>HITCHES</h1>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci did unt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                                <div class="back-to-list">
                                    <a href="#" class="btn-blue">Back To Categories</a>
                                </div>

                                <div class="product-list prod-sub-cat">
                                    <div class="row product-list-row justify-content-md-center">
                                      <div class="col-lg-3 col-md-6 product-list-item">
                                         <div class="product-list-box">
                                             <a href="#" class="product-list-link"></a>
                                             <div class="product-list-image">
                                                 <div class="hover-overlay"></div>
                                                 <img src="public/customer/images/img-sub-categories1.png" alt="Image">
                                             </div>

                                             <div class="product-list-name">
                                                 <p>Hitch Accessories</p>
                                             </div>
                                         </div>
                                      </div>

                                      <div class="col-lg-3 col-md-6 product-list-item">
                                         <div class="product-list-box">
                                             <a href="#" class="product-list-link"></a>
                                             <div class="product-list-image">
                                                 <div class="hover-overlay"></div>
                                                 <img src="public/customer/images/img-sub-categories2.png" alt="Image">
                                             </div>

                                             <div class="product-list-name">
                                                 <p>Hitches - UTL/Flatbed Trucks</p>
                                             </div>
                                         </div>
                                      </div>

                                      <div class="col-lg-3 col-md-6 product-list-item">
                                         <div class="product-list-box">
                                             <a href="#" class="product-list-link"></a>
                                             <div class="product-list-image">
                                                 <div class="hover-overlay"></div>
                                                 <img src="public/customer/images/img-sub-categories3.png" alt="Image">
                                             </div>

                                             <div class="product-list-name">
                                                 <p>Hitch Pins - Assorted sizes</p>
                                             </div>
                                         </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div><!--end main-->
            
@endsection