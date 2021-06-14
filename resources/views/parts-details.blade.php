@extends('layouts.customer.app')
@section('content')
<div id="banner" class="inner-banner">
              <img src="public/customer/images/img-inner-banner.jpg" alt="Image">
              <div class="ib-overlay left-overlay"></div>
              <div class="ib-overlay right-overlay"></div>
            </div>

            <div id="main" class="main">
                <div class="container">
                    <div class="breadcrumbs">
                       <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">Parts &amp; Accessories</a></li>
                           <li><a href="#">Hitches</a></li>
                       </ul>
                    </div>

                    <div class="content">
                        <div class="parts-detail">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="parts-detail-image">
                                        <img src="public/customer/images/img-part-detail1.jpg" alt="Image">
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="parts-detail-content">
                                        <h1>Receiver Tube, 2" I.D. x 24", Plain Finish</h1>
                                        <span class="sub-title">PART# R2425</span>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                                        <ul>
                                            <li>Forged steel collar</li>
                                            <li>Unpainted finish</li>
                                            <li>Solid stress collar opening</li>
                                            <li>5/8" hitch pin hole</li>
                                        </ul>

                                        <p><strong>Weight: 14 lbs</strong></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="parts-detail-price">
                                        <span>$14.00</span>
                                        <button class="btn-blue">Add To Cart</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="parts-detail-back">
                                        <a href="#" class="btn-blue">Back To Categories</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main-->
            
@endsection