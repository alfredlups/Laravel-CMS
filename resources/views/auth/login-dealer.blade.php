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
                           <li><a href="#">Contact</a></li>
                       </ul>
                    </div>

                    <div class="content">
                        <h1>Dealer Login</h1>

                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occa ecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinct.</p>

                        <div class="dealer-login-form">
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 col-lg-6">
                                    <div class="dealer-login-box">
                                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                            @csrf
                                            <div class="form-item">
                                                <label>Chassis Pool</label>
                                                <div class="select-box">
                                                    <select id="" name="">
                                                        <option value="">Select</option>
                                                        <option value="">How Did You Learn About Us?</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-item">
                                                <label>Email Address</label>
                                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-item">
                                                <label class="password-label left">Password</label>
                                                <label class="password-label right" ><a href="#">Forgot Your Password?</a></label>
                                                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                         
                                            <div class="form-item form-action">
                                                <input type="submit" value="Login" class="btn-medium" />
                                            </div>
                                        </form>    
                                     </div>

                                    <div class="join-now-button">
                                        <span>Not A Member?</span>
                                        <input type="submit" value="Join Now" class="btn-medium" />
                                    </div>  

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--end main-->            
@endsection